<?php

class dashboardController extends Controller
{
    private $currentUser;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }

        if (!$this->currentUser->hasAccess(ACTOR::INVESTOR)) {
            $this->redirect('/error/dontHaveAccess');
        }
    }

    public function index()
    {
        $this->render('index');
    }

    public function myfarmers()
    {
        $this->render('myfarmers');
    }

    public function myinvestments()
    {
        $this->render('myinvestments');
    }

    public function myrequests()
    {
        require(ROOT . 'Models/requestFarmer.php');
        $uid = Session::get('user')->getUid();
        $r = new RequestFarmer();

        $requests = $r->getRequestsByInvestor($uid);
        $pendingRequests = [];
        $acceptedRequests = [];
        $rejectedRequests = [];
        if (isset($requests)) {
            foreach ($requests as $request) {
                if ($request['state'] == 'ACCEPTED') {
                    array_push($acceptedRequests, $request);
                } else if ($request['state'] == 'PENDING') {
                    array_push($pendingRequests, $request);
                } else if ($request['state'] == 'REJECTED') {
                    array_push($rejectedRequests, $request);
                }
            }

            $this->set(['pr' => $pendingRequests, 'ar' => $acceptedRequests, 'rr' => $rejectedRequests]);
        } else {
            $this->set(['error' => "no requests found"]);
        }


        $this->render('myrequests');
    }
}
