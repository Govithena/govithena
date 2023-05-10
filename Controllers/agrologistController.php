<?php

class agrologistController extends Controller
{
    private $currentUser;
    private $lastmonthFarmerCount = 0;
    private $imageHandler;

    public function __construct()
    {
        $this->currentUser = Session::get('user');

        $this->imageHandler = new ImageHandler($folder = 'Uploads');

        if (!Session::isLoggedIn()) {
            $this->redirect('/auth/signin');
        }
        // $this->lastmonthFarmerCount =0;
        if (!$this->currentUser->hasAccess(ACTOR::AGROLOGIST)) {
            $this->redirect('/error/dontHaveAccess');
        }

    }

    // public function setlastmonthFarmerCount($lastmonthFarmerCount) { 
    //     $this->lastmonthFarmerCount = $lastmonthFarmerCount; 
    // }
    // public function getlastmonthFarmerCount() { 
    //     return $this->lastmonthFarmerCount; 
    // }

    public function index()
    {
        require(ROOT . 'Models/agrologist.php');
        $agrologist = new Agrologist();

        $notifications = $agrologist->getnotifications();
        $farmerCount = $agrologist->getFarmerCount();
        $farmerCountLastMonh = $agrologist->getFarmerCountLastMonh();
        $farmerCountTwoMonthsBefore = $agrologist->getFarmerCountTwoMonthsBefore();
        $farmerCountThreeMonthsBefore = $agrologist->getFarmerCountThreeMonthsBefore();
        $farmerCountFourMonthsBefore = $agrologist->getFarmerCountFourMonthsBefore();
        $farmerCountFiveMonthsBefore = $agrologist->getFarmerCountFiveMonthsBefore();
        $AgrologistTotalIncome = $agrologist->getAgrologistTotalIncome();
        $AgrologistMonthlyIncome = $agrologist->getAgrologistMonthlyIncome();
        $AgrologistFieldVisits = $agrologist->getAgrologistFieldVisits();
        $AgrologistFieldVisitsLastMonth = $agrologist->getAgrologistFieldVisitsLastMonth();
        $GigCount = $agrologist->getGigCount();
        $GigCountLastMonth = $agrologist->getGigCountLastMonth();
        $GigCountTwoMonthsBefore = $agrologist->getGigCountTwoMonthsBefore();
        $GigCountThreeMonthsBefore = $agrologist->getGigCountThreeMonthsBefore();
        $GigCountFourMonthsBefore = $agrologist->getGigCountFourMonthsBefore();
        $GigCountFiveMonthsBefore = $agrologist->getGigCountFiveMonthsBefore();
        $GigCountPerCategory = $agrologist->getGigsPerCategory();
        $incomeLimit = $agrologist->getIncomeLimit();
        $withdrawalsLimit = $agrologist->getWithdrawalsLimit();


        // echo json_encode($notifications);
        //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>". $notifications . "</h1>";

        //assign farmer count if month changes
        // date('m') != date('m', strtotime("-1 days")
        if (date('m') != 2) {
            $this->lastmonthFarmerCount = $farmerCount[0]['farmerCount'];
        }
        // echo json_encode($this->lastmonthFarmerCount);
        // $lastmonthFarmerCount = 

        $this->set([
            'notifications' => $notifications,
            'farmerCount' => $farmerCount,
            'farmerCountLastMonh' => $farmerCountLastMonh,
            'farmerCountTwoMonthsBefore' => $farmerCountTwoMonthsBefore,
            'farmerCountThreeMonthsBefore' => $farmerCountThreeMonthsBefore,
            'farmerCountFourMonthsBefore' => $farmerCountFourMonthsBefore,
            'farmerCountFiveMonthsBefore' => $farmerCountFiveMonthsBefore,
            'agrologistTotalIncome' => $AgrologistTotalIncome,
            'agrologistMonthlyIncome' => $AgrologistMonthlyIncome,
            'agrologistFieldVisits' => $AgrologistFieldVisits,
            'agrologistFieldVisitsLastMonth' => $AgrologistFieldVisitsLastMonth,
            'gigCount' => $GigCount,
            'gigCountLastMonth' => $GigCountLastMonth,
            'gigCountTwoMonthsBefore' => $GigCountTwoMonthsBefore,
            'gigCountThreeMonthsBefore' => $GigCountThreeMonthsBefore,
            'gigCountFourMonthsBefore' => $GigCountFourMonthsBefore,
            'gigCountFiveMonthsBefore' => $GigCountFiveMonthsBefore,
            'gigCountPerCategory' => $GigCountPerCategory,
            'incomeLimit' => $incomeLimit,
            'withdrawalsLimit' => $withdrawalsLimit,
        ]);
        $this->render('index');
    }

    public function farmers($params)
    {
        if (!empty($params)) {
            require(ROOT . 'Models/agrologist.php');
            $agrologist = new Agrologist();

            if (count($params) == 1) {
                $this->farmergigs($agrologist, $params[0]);
            } else if ($params[1] == "payments") {
                $this->payments($agrologist, $params[0]);
            } else {
                $uid = Session::get('user')->getUid();
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    if (isset($_POST['update_details_btn'])) {

                        $fieldVisitId = new UID(PREFIX::FEILDVISIT);

                        $week = new Input(POST, 'week');
                        $date = new Input(POST, 'date');
                        $description = new Input(POST, 'description');



                        // if ($update) {
                        try {
                            $images = $this->imageHandler->upload('images');

                            if (!empty($images)) {
                                $update = $agrologist->insertFieldVisit([
                                    'visitId' => $fieldVisitId,
                                    'week' => $week->get(),
                                    'gigId' => $params[1],
                                    'agrologistId' => $uid,
                                    'farmerId' => $params[0],
                                    'fieldVisitDetails' => $description->get(),
                                    'fieldVisitImage' => $images[0],
                                    'visitDate' => $date->get(),
                                ]);
                                $images = array_slice($images, 1);
                                if (!empty($images)) {
                                    foreach ($images as $image) {
                                        $updateimages = $agrologist->insertFieldVisitImage([
                                            'visitId' => $fieldVisitId,
                                            'image' => $image,
                                        ]);
                                    }
                                }

                            }

                            if ($update) {
                                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully Updated!');
                            } else {
                                $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong.');
                            }

                            Session::set(['update_field_visit_alert' => $alert]);

                        } catch (Exception $e) {
                            echo $e->getMessage();
                            die();
                        }
                        // }

                    }
                }

                $this->farmerdetails($agrologist, $params[0], $params[1]);
                //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $Session::get('uid') . "</h1>";
            }


        } else {

            require(ROOT . 'Models/agrologist.php');
            $agr = new Agrologist();

            $farmers = $agr->getFarmers();
            // $farmerReviews = $agr->getFarmerReviews();
            if (isset($farmers)) {
                $this->set(['ar' => $farmers]);
            } else {
                $this->set(['error' => "no farmers"]);
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['complete_btn'])) {
                    $complete = $agr->completeRequest($_POST['complete_btn']);
                    // echo json_encode($complete);
                    if ($complete) {
                        $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully Completed.');

                    } else {
                        $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong.');
                    }
                    Session::set(['complete_farmer_alert' => $alert]);
                }
                // echo json_encode($complete);
                


            }
            $this->render('farmers');
        }
    }

    // public function reviews()
    // {
    //     $this->render('reviews');
    // }


    public function reviews($params)
    {
        // $props = [];
        // if (!isset($params[0]) || empty($params[0])) {
        //     $this->redirect('/error/dontHaveAccess/1');
        // }
        // $gigId = $params[0];
        // Session::set(['gigId' => $gigId]);

        // $props['gig'] = $gig = $this->gigModal->fetchBy($gigId);
        // if (!$props['gig']) {
        //     $this->redirect('/error/dontHaveAccess/2');
        // }

        // $props['farmer'] = $this->userModal->fetchBy($gig['farmerId']);
        // if (!$props['farmer']) {
        //     $this->redirect('/error/dontHaveAccess/3');
        // }


        require(ROOT . 'Models/agrologist.php');
        $agr = new Agrologist();

        $farmerName = $agr->getFarmerName($params[0]);
        // echo json_encode($params[0]);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['submit_review'])) {
                $data = [
                    'reviewId' => new UID(PREFIX::REVIEW),
                    'agrologistId' => $this->currentUser->getUid(),
                    'farmerId' => $params[0],
                    'q1' => new Input(POST, 'q1'),
                    'q2' => new Input(POST, 'q2'),
                    'q3' => new Input(POST, 'q3'),
                    'q4' => new Input(POST, 'q4'),
                    'q5' => new Input(POST, 'q5'),
                    'q6' => new Input(POST, 'q6'),
                    'q7' => new Input(POST, 'q7'),
                    'q8' => new Input(POST, 'q8'),
                    'q9' => new Input(POST, 'q9'),
                ];
                // var_dump($data);die;

                $review = $agr->save($data);

                if ($review) {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully updated!.');

                } else {
                    $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong.');
                }
                Session::set(['review_agrologist_alert' => $alert]);

                echo json_encode($farmerName);

                //$response = $reviewByInvestor->save($data);
                //if($response['success']){}
            }
        }



        $this->set(['farmerName' => $farmerName]);
        // echo json_encode($farmerName);
        $this->render('reviews');
    }



    public function requests($params)
    {
        if (!empty($params)) {
            $this->requestdetails($params[0]);
        } else {
            require(ROOT . 'Models/agrologist.php');
            $agr = new Agrologist();

            $requests = $agr->farmerRequest();

            if (isset($requests)) {
                $this->set(['ar' => $requests]);
            } else {
                $this->set(['error' => "no requests found"]);
            }

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['accept'])) {
                    $accept = $agr->acceptRequest($_POST['accept']);

                    if ($accept) {
                        $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully Accepted Request!');

                    } else {
                        $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong.');
                    }

                    $data = [
                        'reviewId' => new UID(PREFIX::REVIEW),
                        'agrologistId' => $this->currentUser->getUid(),
                        'farmerId' => $_POST['accept'],
                        'q1' => 0,
                        'q2' => 0,
                        'q3' => 0,
                        'q4' => 0,
                        'q5' => 0,
                        'q6' => 0,
                        'q7' => 0,
                        'q8' => "",
                        'q9' => "",
                    ];

                    $agr->save($data);
                } elseif (isset($_POST['decline'])) {
                    $decline = $agr->declineRequest($_POST['decline']);
                    $farmerId = $agr->getFarmerId($_POST['decline']);

                    if ($decline) {
                        $alert = new Alert($type = 'success', $icon = "", $message = 'Declined Request.');

                    } else {
                        $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong.');
                    }

                    

                } else {
                    echo "<h1 style='color: white; margin-top: 500px; margin-left: 1000px'>nope</h1>";

                }
                Session::set(['farmer_request_alert' => $alert]);
            }

            $this->render('requests');
        }


    }

    public function myaccount()
    {
        require(ROOT . 'Models/agrologist.php');
        $agrologist = new Agrologist();

        $uid = Session::get('user')->getUid();

        $d['agrologist'] = $agrologist->getAgrologistDetails();
        $d['account'] = $agrologist->getAccountDetails();
        $d['qualifications'] = $agrologist->getQualificationDetails();
        //var_dump($d['agrologist']);
        // die();

        if (isset($_POST['edit_details_btn'])) {

            $firstName = new Input(POST, 'firstName');
            $lastName = new Input(POST, 'lastName');
            $city = new Input(POST, 'city');
            $phoneNumber = new Input(POST, 'phoneNumber');
            $nic = new Input(POST, 'NIC');
            $addressLine1 = new Input(POST, 'addressLine1');
            $addressLine2 = new Input(POST, 'addressLine2');
            $district = new Input(POST, 'district');
            $postalCode = new Input(POST, 'postalCode');


            if (move_uploaded_file($_FILES['profile_img']['tmp_name'], "Uploads/" . basename($_FILES['profile_img']['name']))) {
                //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'> file uploaded  </h1>";
                Session::get('user')->setImage(basename($_FILES['profile_img']['name']));

                $edit_user = $agrologist->edit_user_details([
                    'uid' => $uid,
                    'firstName' => $firstName->get(),
                    'lastName' => $lastName->get(),
                    'city' => $city->get(),
                    'phoneNumber' => $phoneNumber->get(),
                    'nic' => $nic->get(),
                    'addressLine1' => $addressLine1->get(),
                    'addressLine2' => $addressLine2->get(),
                    'district' => $district->get(),
                    'postalCode' => $postalCode->get(),
                    'profileImage' => basename($_FILES['profile_img']['name'])
                ]);
                // echo "file uploaded";
            } else {
                $edit_user = $agrologist->edit_user_without_image([
                    'uid' => $uid,
                    'firstName' => $firstName->get(),
                    'lastName' => $lastName->get(),
                    'city' => $city->get(),
                    'phoneNumber' => $phoneNumber->get(),
                    'nic' => $nic->get(),
                    'addressLine1' => $addressLine1->get(),
                    'addressLine2' => $addressLine2->get(),
                    'district' => $district->get(),
                    'postalCode' => $postalCode->get()
                ]);
                //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'> file not uploaded  </h1>";

                //echo "file not uploaded";
            }

            if ($edit_user) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully Submitted!');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong!');
            }

            Session::set(['edit_user_details_alert' => $alert]);

        }

        if (isset($_POST['add_account_details_btn'])) {
            $accountNumber = new Input(POST, 'account_number');
            $bankName = new Input(POST, 'bank_name');
            $branch = new Input(POST, 'branch');
            $branchCode = new Input(POST, 'branch_code');

            $insert_account = $agrologist->insertAccountDetails([
                'accountNumber' => $accountNumber->get(),
                'bank' => $bankName->get(),
                'branch' => $branch->get(),
                'branchCode' => $branchCode->get()
            ]);

            if ($insert_account) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully Submitted!');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong!');
            }

            Session::set(['add_account_details_alert' => $alert]);
        }

        if (isset($_POST['edit_account_details_btn'])) {
            $accountNumber = new Input(POST, 'account_number');
            $bankName = new Input(POST, 'bank_name');
            $branch = new Input(POST, 'branch');
            $branchCode = new Input(POST, 'branch_code');

            $edit_account = $agrologist->updateAccountDetails([
                'accountNumber' => $accountNumber->get(),
                'bank' => $bankName->get(),
                'branch' => $branch->get(),
                'branchCode' => $branchCode->get()
            ]);

            if ($edit_account) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully Updated!');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong!');
            }

            Session::set(['edit_account_details_alert' => $alert]);
        }

        if (isset($_POST['add_qualification_details_btn'])) {
            $gnCertificate = new Input(POST, 'gn_certificate');
            $description = new Input(POST, 'description');


            if (move_uploaded_file($_FILES['gn_certificate']['tmp_name'], "Uploads/" . basename($_FILES['gn_certificate']['name']))) {
                Session::get('user')->setImage(basename($_FILES['gn_certificate']['name']));
                $insert_qualifications = $agrologist->insertQualificationDetails([
                    'gnCertificate' => basename($_FILES['gn_certificate']['name']),
                    'description' => $description->get()
                ]);

                if ($insert_qualifications) {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully Submitted!');
                } else {
                    $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong!');
                }

                Session::set(['add_qualification_details_alert' => $alert]);
            }


        }

        if (isset($_POST['edit_qualification_details_btn'])) {
            $gnCertificate = new Input(POST, 'gn_certificate');
            $description = new Input(POST, 'description');


            if (move_uploaded_file($_FILES['gn_certificate']['tmp_name'], "Uploads/" . basename($_FILES['gn_certificate']['name']))) {
                Session::get('user')->setImage(basename($_FILES['gn_certificate']['name']));
                $edit_qualifications = $agrologist->updateQualificationDetails([
                    'gnCertificate' => basename($_FILES['gn_certificate']['name']),
                    'description' => $description->get()
                ]);

            } else {
                $edit_qualifications = $agrologist->updateQualificationDescription([
                    'description' => $description->get()
                ]);
            }
            if ($edit_qualifications) {
                $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully Submitted!');
            } else {
                $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong!');
            }
            Session::set(['edit_qualification_details_alert' => $alert]);

        }



        $this->set($d);
        $this->render('myaccount');
    }

    public function requestdetails($id)
    {
        require(ROOT . 'Models/agrologist.php');
        $agrologist = new Agrologist();


        $request = $agrologist->farmerRequestDetails($id);
        $gig = $agrologist->getFarmerGigsRequest($id);
        // echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $d['message'] . "</h1>";

        // $this->set($d);
        $this->set([
            'requestDetails' => $request,
            'gigDetails' => $gig
        ]);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['accept'])) {
                var_dump($_POST['accept']);
                //echo "<h1 style='color: white; margin-top: 500px; margin-left: 1000px'>" . $_POST['accept'] . "</h1>";
                $agr->acceptRequest($_POST['accept']);

                $data = [
                    'reviewId' => new UID(PREFIX::REVIEW),
                    'agrologistId' => $this->currentUser->getUid(),
                    'farmerId' => $_POST['accept'],
                    'q1' => 0,
                    'q2' => 0,
                    'q3' => 0,
                    'q4' => 0,
                    'q5' => 0,
                    'q6' => 0,
                    'q7' => 0,
                    'q8' => "",
                    'q9' => "",
                ];

                $agr->save($data);
                //$this->redirect("/agrologist/farmers");
            } elseif (isset($_POST['decline'])) {
                //var_dump($_POST['accept']);
                //echo "<h1 style='color: white; margin-top: 500px; margin-left: 1000px'>" . $_POST['accept'] . "</h1>";
                $agr->declineRequest($_POST['decline']);
                $farmerId = $agr->getFarmerId($_POST['decline']);
                // echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $farmerId[0] . "</h1>";
                echo json_encode($farmerId[0]['farmerId']);

                $agr->declineNotificationFarmer($farmerId[0]['farmerId']);
                //$this->redirect("/agrologist/farmers");
            } else {
                echo "<h1 style='color: white; margin-top: 500px; margin-left: 1000px'>nope</h1>";

            }
        }


        return $this->render('requestdetails');
    }

    public function farmerdetails($agrologist, $fid, $gid)
    {
        // require(ROOT . 'Models/agrologist.php');
        // $agrologist = new Agrologist();
        $uid = Session::get('user')->getUid();
        //echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $uid . "</h1>";

        $d['fieldVisit'] = $agrologist->getFieldVisitDetails($fid, $gid);
        $d['fid'] = $fid;
        $d['gid'] = $gid;






        $this->set($d);
        return $this->render('farmerdetails');
    }

    public function farmergigs($agrologist, $id)
    {
        // require(ROOT . 'Models/agrologist.php');
        // $agrologist = new Agrologist();
        $d['gigDetails'] = $agrologist->getFarmerGigs(['farmerId' => $id]);

        $this->set($d);
        return $this->render('farmergigs');
    }

    public function chat($userId)
    {
        // echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $userId[0] . "</h1>";
        // echo json_encode($userId);
        require(ROOT . 'Models/agrologist.php');
        $agrologist = new Agrologist();

        $d['messages'] = $agrologist->getmessages($userId[0]);
        // echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>" . $d['message'] . "</h1>";
        if (isset($_POST['update_details_btn'])) {
            $incomingMsgId = new Input(POST, 'incomingMsgId');
            $outgoingMsgId = new Input(POST, 'outgoingMsgId');
            $msg = new Input(POST, 'msg');

            $agrologist->insertMessages([
                'incomingMsgId' => $incomingMsgId->get(),
                'outgoingMsgId' => $outgoingMsgId->get(),
                'msg' => $msg->get()
            ]);
        }

        $this->set($d);
        //echo json_encode($d['messages'] );
        return $this->render('chat');
    }

    public function payments($agrologist, $fid)
    {
        // require(ROOT . 'Models/agrologist.php');
        // $agrologist = new Agrologist();

        $d['timePeriod'] = $agrologist->getRequestTimePeriod($fid);
        $d['paymentDetails'] = $agrologist->getPaymentDetails($fid);
        $this->set($d);
        return $this->render('payments');
    }

    public function withdrawals()
    {
        require(ROOT . 'Models/agrologist.php');
        $agrologist = new Agrologist();

        $d['withdrawal'] = $agrologist->getAgrologistTotalWithrawal();
        $d['income'] = $agrologist->getAgrologistTotalIncome();
        $d['monthly_withdrawal'] = $agrologist->getAgrologistMonthlyWithrawal();
        $d['account'] = $agrologist->getAccountDetails();
        $d['income_list'] = $agrologist->getIncome();
        $d['withdrawal_list'] = $agrologist->getWithdrawals();
        // $d['paymentDetails'] = $agrologist->getPaymentDetails($fid);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // if ($_GET['withdraw'] == 'confirm') {
            //     $withdrawal = new INPUT(POST, 'withdraw_amount');
            

            // }
            if (isset($_POST['transfer_confirm_btn'])) {
                $withdraw = $agrologist->insertWithdrawals([
                    'withdrawalId' => new UID(PREFIX::WITHDRAWAL),
                    'withdrawal' => new INPUT(POST, 'withdraw_amount'),
                ]);

                if ($withdraw) {
                    $alert = new Alert($type = 'success', $icon = "", $message = 'Successfully Submitted!');
                } else {
                    $alert = new Alert($type = 'error', $icon = "", $message = 'Something went wrong!');
                }
                Session::set(['agrologist_withdraw_alert' => $alert]);
            }

        }





        $this->set($d);
        return $this->render('withdrawals');
    }


}