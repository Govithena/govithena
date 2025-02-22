<?php

use function PHPSTORM_META\type;

class checkoutController extends Controller
{
    private $investmentModel;
    private $gigRequestModel;
    private $currentUser;
    private $gigModel;

    private $header = [
        'merchant_id' => '1221583',
        'return_url' => URLROOT . '/checkout/return/',
        'cancel_url' => URLROOT . '/checkout/',
        'notify_url' => URLROOT . '/checkout/notify/',
        'currency' => 'LKR',

    ];

    private $payhere_secret = 'MjU5NTkxMzU4OTQwODAxODI4MTYxMzE1NDg2NDYxMTk3Mzg1Mzk4OA==';

    public function __construct()
    {

        if (!Session::isLoggedIn()) {
            $this->redirect('/signin');
        }
        $this->header['email'] = Session::get('username');

        $this->currentUser = Session::get('user');
        $this->investmentModel = $this->model('investment');
        $this->gigRequestModel = $this->model('gigRequest');
        $this->gigModel = $this->model('gig');
    }

    private function payhere($d)
    {
        $this->header['cancel_url'] .= $d['order_id'];

        $data = array_merge($this->header, $d);
        // $md5sig = strtoupper(md5($data['merchant_id'] . $data['order_id'] . $data['amount'] . "LKR" . strtoupper(md5($this->payhere_secret))));
        // $data['hash'] = 'DF25675446C0A320CBFE29D9F58189AA';


        // $sig1 = strtoupper(md5('1221583' + '30' + '2500' + 'LKR' + strtoupper(md5('MjU5NTkxMzU4OTQwODAxODI4MTYxMzE1NDg2NDYxMTk3Mzg1Mzk4OA=='))));
        // $temp = array('1221583', '30', '2500', 'LKR', strtoupper(md5('MjU5NTkxMzU4OTQwODAxODI4MTYxMzE1NDg2NDYxMTk3Mzg1Mzk4OA==')));
        // $str = implode('', $temp);
        // $sig2 = strtoupper(md5($str));
        // $data['hash'] = $sig2;
        // echo phpversion();
        if (isset($_POST['pay'])) {
            $id = $_POST['pay'];
            $res = $this->gigRequestModel->getRequestById($id);

            if (isset($res)) {

                $data = [
                    'first_name' => 'achini',
                    'last_name' => 'c',
                    'email' => Session::get('username'),
                    'phone' => '0771234567',
                    'address' => 'No.1, Galle Road',
                    'city' => 'Colombo',
                    'order_id' => '30',
                    'items' => $res['title'],
                    'currency' => 'LKR',
                    'amount' => '2500',
                    'country' => 'Sri Lanka',
                ];
                $this->payhere($data);
            }
        }

        $sig = '1221583';
        $sig .= '30';
        $sig .= number_format('3212', 2, '.', '');
        $sig .= 'LKR';
        $sig .= strtoupper(md5($this->payhere_secret));
        $sig = strtoupper(md5($sig));
        $data['hash'] = $sig;

        // print_r($data);
        echo json_encode($data);

        $url = "https://sandbox.payhere.lk/pay/checkout";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_HEADER, array('Content-Type: application/x-www-form-urlencoded', 'Connection: Keep-Alive'));
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        $response = curl_exec($ch);
        curl_close($ch);
        echo $response;
    }

    public function pay()
    {
        if (isset($_POST['pay'])) {

            $id = new Input(POST, 'pay');

            $request = $this->gigRequestModel->getRequestById($id);
            if ($request['success']) {
                $request = $request['data'];
            } else {
                $this->redirect('/error/somethingWentWrong');
            }

            $response = $this->gigModel->ReserveGig([
                'gigId' => $request['gigId'],
                'investorId' => $this->currentUser->getUid(),
            ]);

            if ($response['success']) {
                $response = $this->investmentModel->add([
                    'id' => new UID(PREFIX::INVESTMENT),
                    'investorId' => $this->currentUser->getUid(),
                    'gigId' => $request['gigId'],
                    'farmerId' => $request['farmerId'],
                    'amount' => $request['capital'],
                    'description' => "Initial Investment",
                ]);

                if ($response['success']) {
                    $this->gigRequestModel->updateStatus($id, 'PAID');
                    $this->redirect('/dashboard');
                } else {
                    $this->redirect('/error/someThingWentWrong');
                }
            } else {
                $this->redirect('/error/someThingWentWrong');
            }
            $this->redirect('/dashboard');
        }
    }

    public function index($params)
    {
        $props = [];

        if (!empty($params)) $reId = $params[0];

        $response = $this->gigRequestModel->getRequestById($reId);
        if ($response['success']) {
            $props['res'] = $response['data'];
            $this->set($props);
            $this->render('index');
        } else {
            $this->redirect('/error');
        }
    }
}
