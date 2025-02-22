<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="../Webroot/css/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" href="../Webroot/css/agrologist/myaccount.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    $active = "myaccount";
    require_once("navigator.php");

    if (Session::has('edit_user_details_alert')) {
        $alert = Session::pop('edit_user_details_alert');
        $alert->show_default_alert();
    }

    if (Session::has('add_account_details_alert')) {
        $alert = Session::pop('add_account_details_alert');
        $alert->show_default_alert();
    }

    if (Session::has('edit_account_details_alert')) {
        $alert = Session::pop('edit_account_details_alert');
        $alert->show_default_alert();
    }

    if (Session::has('add_qualification_details_alert')) {
        $alert = Session::pop('add_qualification_details_alert');
        $alert->show_default_alert();
    }

    if (Session::has('edit_qualification_details_alert')) {
        $alert = Session::pop('edit_qualification_details_alert');
        $alert->show_default_alert();
    }
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <div class="[ profile_continer ]">

            <div class="[ profile_wrapper ]">


                <div class="[ profile_card bg-light ]">
                    <div class="[ profile_img ]">
                        <img src="<?php echo UPLOADS . '/' . $agrologist[0]['image'] ?>" alt="" <?php echo DEFAULT_PROFILE_PICTURE ?>>
                    </div>
                    <div class="flex flex-row ">
                        <div class="[ profile_content ]">


                            <?php echo "<h1>" . $agrologist[0]['firstName'] . " " . $agrologist[0]['lastName'] . "</h1>"; ?>

                            <?php echo "<h4 class='fw-6'>" . ucwords($agrologist[0]['userType']) . "</h4>"; ?>
                            <div>
                                <p class="caption">Here you can change your personal information as account details.</p>
                                <p class="caption">Completing your qualification details will be of help in recognizing
                                    your profile.</p>
                            </div>
                            

                        </div>
                        
                    </div>
                </div>

            </div>

        </div>

        <div class="tabs" tab="3">
            <div class="controls">
                <button class="control" for="1">Personal Details</button>
                <button class="control" for="2">Qualification Details</button>
                <button class="control" for="3">Account Details</button>
            </div>


           
            <div class="wrapper">
                <div class="tab" id="1" active="true">
                    <div class="[ requests__continer ]"
                        style="background-color: white; margin-bottom: 100px; padding: 30px">
                        <form action="" method="POST">
                            <div class="flex flex-row flex-sb-c ">
                                <div>
                                    <h2>Personal Details</h2>

                                </div>

                                <div>
                                    <a href="#" class="btn uppercase fs-4 btn-primary " id="edit_details">Edit
                                        Profile</a>
                                </div>

                            </div>
                            <hr>
                        </form>
                        <?php
                        if ($agrologist[0]['firstName'] != null && $agrologist[0]['lastName'] != null) {
                            echo "<div style='color: grey' class='pt-1'>Full Name</div>";
                            echo "<div>" . ucwords($agrologist[0]['firstName']) . " " . ucwords($agrologist[0]['lastName']) . "</div>";
                        }
                        ?>
                        <div style="color: grey" class="pt-1">Email</div>
                        <?php echo "<div>" . strtolower($agrologist[0]['username']) . "</div>"; ?>
                        <?php
                        if ($agrologist[0]['NIC'] != null) {
                            echo "<div style='color: grey' class='pt-1'>NIC</div>";
                            echo "<div>" . $agrologist[0]['NIC'] . "</div>";
                        }
                        ?>
                        <?php
                        if ($agrologist[0]['phoneNumber']) {
                            echo "<div style='color: grey' class='pt-1'>Mobile Number</div>";
                            echo "<div>" . $agrologist[0]['phoneNumber'] . "</div>";
                        }
                        ?>
                        <?php
                        if ($agrologist[0]['addressLine1'] || $agrologist[0]['addressLine2'] || $agrologist[0]['city'] || $agrologist[0]['district'] || $agrologist[0]['postalCode']) {
                            echo "<div style='color: grey' class='pt-1'>Address</div>";
                        }
                        if ($agrologist[0]['addressLine1']) {
                            echo "<div>" . ucwords($agrologist[0]['addressLine1']) . ",</div>";
                        }
                        if ($agrologist[0]['addressLine2']) {
                            echo "<div>" . ucwords($agrologist[0]['addressLine2']) . ",</div>";
                        }
                        if ($agrologist[0]['city']) {
                            echo "<div>" . ucwords($agrologist[0]['city']) . ",</div>";
                        }
                        if ($agrologist[0]['district']) {
                            echo "<div>" . ucwords($agrologist[0]['district']) . ".</div>";
                        }
                        if ($agrologist[0]['postalCode']) {
                            echo "<div>" . ucwords($agrologist[0]['postalCode']) . "</div>";
                        }
                        ?>
                        <div id="edit_detials_modal" class="modal">

                            <div class="modal-content">
                                <span class="close close_modal1">&times;</span>
                                <h3>Edit Details</h3>
                                <form class="form pt-1" action="<?php echo URLROOT ?>/agrologist/myaccount"
                                    method="post" enctype="multipart/form-data">
                                    <div class="[ grid ]" sm="1" lg="2" gap="2">

                                        <div class="wrapper">
                                            <input type="text" name="firstName" class="" placeholder="First Name"
                                                value="<?php echo $agrologist[0]['firstName'] ?>">
                                        </div>
                                        <div class="wrapper">

                                            <input type="text" name="lastName" class="" placeholder="Last Name"
                                                value="<?php echo $agrologist[0]['lastName'] ?>">
                                        </div>
                                        <div class="wrapper">

                                            <input type="text" name="phoneNumber" class="" placeholder="Mobile"
                                                value="<?php echo $agrologist[0]['phoneNumber'] ?>">
                                        </div>
                                        <div class="wrapper">

                                            <input type="text" name="NIC" class="" placeholder="NIC"
                                                value="<?php echo $agrologist[0]['NIC'] ?>">
                                        </div>
                                        <input type="text" name="addressLine1" class="" placeholder="Address Line1"
                                            value="<?php echo $agrologist[0]['addressLine1'] ?>">
                                        <input type="text" name="addressLine2" class="" placeholder="Address Line2"
                                            value="<?php echo $agrologist[0]['addressLine2'] ?>">
                                       
                                        <input type="text" name="city" placeholder="City"
                                            value="<?php echo $agrologist[0]['city'] ?>">
                                        <input type="text" name="district" placeholder="District"
                                            value="<?php echo $agrologist[0]['district'] ?>">
                                       
                                        <input type="text" name="postalCode" placeholder="Postal Code"
                                            value="<?php echo $agrologist[0]['postalCode'] ?>">
                                        <input type='file' name="profile_img" accept="image/*">
                                    </div>
                                    <button type="submit" name="edit_details_btn" class="btn uppercase">Edit
                                        details</button>
                                </form>
                            </div>

                        </div>

                    </div>

                </div>
                <div class="tab" id="2">
                    <div class="[ requests__continer ]"
                        style="background-color: white; margin-bottom: 100px; padding: 30px">
                        <form action="<?php echo URLROOT . '/agrologist/requests/' . $request['requestId'] . '/' ?>"
                            method="POST">
                            <div class="flex flex-row flex-sb-c ">
                                <div>
                                    <h2>Qualification Details</h2>

                                </div>
                                <?php
                                if (!empty($qualifications)) {
                                    ?>
                                    <div>
                                        <a href="#" class="btn uppercase fs-4 btn-primary "
                                            id="edit_qualification_details">Edit
                                            Qualification Details</a>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div>
                                        <a href="#" class="btn uppercase fs-4 btn-primary "
                                            id="add_qualification_details">Add
                                            Qualification Details</a>
                                    </div>

                                    <?php
                                }
                                ?>
                            </div>
                            <hr>
                        </form>

                        <?php
                        if (!isset($qualifications) || empty($qualifications)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                            ?>

                            <div style="color: grey" class="pt-1">Grama Niladhari Certificate</div>
                            <a href="<?php echo UPLOADS; ?><?php echo $qualifications[0]['gnCertificate'] ?>"
                                target="_blank">Click to View the Certificate</a>
                            <div style="color: grey" class="pt-1">Qualification Description</div>
                            <?php echo "<div>" . $qualifications[0]['description'] . "</div>"; ?>

                            <?php
                        }
                        ?>

                        <div id="add_qualification_detials_modal" class="modal">

                            <div class="modal-content">
                                <span class="close close_modal_add_qualifications">&times;</span>
                                <h3>Add Qualifications Details</h3>
                                <form class="form pt-1" action="<?php echo URLROOT ?>/agrologist/myaccount"
                                    method="post" enctype="multipart/form-data">
                                    <input type="file" name="gn_certificate" class="" required><br>
                                    <input type="text" name="description" class="" placeholder="Description"><br>
                                    <button type="submit" name="add_qualification_details_btn"
                                        class="btn uppercase">Submit</button>
                                </form>
                            </div>
                        </div>

                        <div id="edit_qualification_detials_modal" class="modal">

                            <div class="modal-content">
                                <span class="close close_modal_edit_qualifications">&times;</span>
                                <h3>Edit Qualifications Details</h3>
                                <form class="form pt-1" action="<?php echo URLROOT ?>/agrologist/myaccount"
                                    method="post" enctype="multipart/form-data">
                                    <input type="file" name="gn_certificate" class=""
                                        value="<?php echo $qualifications[0]['gnCertificate'] ?>"><br>
                                    <input type="text" name="description" placeholder="Description"
                                        value="<?php echo $qualifications[0]['description'] ?>"><br>
                                    <button type="submit" name="edit_qualification_details_btn"
                                        class="btn uppercase">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="tab" id="3">
                    <div class="[ requests__continer ]"
                        style="background-color: white; margin-bottom: 100px; padding: 30px">
                        <form action="<?php echo URLROOT . '/agrologist/requests/' . $request['requestId'] . '/' ?>"
                            method="POST">
                            <div class="flex flex-row flex-sb-c ">
                                <div>
                                    <h2>Account Details</h2>

                                </div>
                                <?php
                                if (!empty($account)) {
                                    ?>
                                    <div>
                                        <a href="#" class="btn uppercase fs-4 btn-primary " id="edit_account_details">Edit
                                            Account Details</a>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div>
                                        <a href="#" class="btn uppercase fs-4 btn-primary " id="add_account_details">Add
                                            Account Details</a>
                                    </div>

                                    <?php
                                }
                                ?>
                            </div>
                            <hr>
                        </form>
                        <?php
                        if (!isset($account) || empty($account)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                            ?>
                            <div style="color: grey" class="pt-1">Bank</div>
                            <?php echo "<div>" . BANK[$account[0]['bank']] . "</div>"; ?>
                            <div style="color: grey" class="pt-1">Account Number</div>
                            <?php echo "<div>" . $account[0]['accountNumber'] . "</div>"; ?>
                            <div style="color: grey" class="pt-1">Branch</div>
                            <?php echo "<div>" . ucwords($account[0]['branch']) . "</div>"; ?>
                            <div style="color: grey" class="pt-1">Branch Code</div>
                            <?php echo "<div>" . $account[0]['branchCode'] . "</div>"; ?>
                            <?php
                        }
                        ?>



                        <div id="add_account_detials_modal" class="modal">

                            <div class="modal-content">
                                <span class="close close_modal_add_account">&times;</span>
                                <h3>Add Account Details</h3>
                                <form class="form pt-1" action="<?php echo URLROOT ?>/agrologist/myaccount"
                                    method="post" enctype="multipart/form-data">
                                    <select id="bank_name" name="bank_name" required>
                                        <?php foreach (BANK as $key => $value)
                                            echo "<option value='$key'>$value</option>";
                                        ?>
                                    </select><br>
                                    <!-- <input type="text" name="bank_name" class="" placeholder="Bank Name"><br> -->
                                    <input type="text" name="account_number" class="" placeholder="Account Number"
                                        required><br>
                                    <input type="text" name="branch" class="" placeholder="Branch" required><br>
                                    <input type="text" name="branch_code" class="" placeholder="Branch Code"
                                        required><br>
                                    <button type="submit" name="add_account_details_btn"
                                        class="btn uppercase">Submit</button>
                                </form>
                            </div>
                        </div>

                        <div id="edit_account_detials_modal" class="modal">

                            <div class="modal-content">
                                <span class="close close_modal_edit_account">&times;</span>
                                <h3>Edit Account Details</h3>
                                <form class="form pt-1" action="<?php echo URLROOT ?>/agrologist/myaccount"
                                    method="post" enctype="multipart/form-data">
                                    <select id="bank_name" name="bank_name" required>
                                        <?php foreach (BANK as $key => $value)
                                            echo "<option value='$key'>$value</option>";
                                        ?>
                                    </select><br>
                                    <input type="text" name="account_number" class="" placeholder="Account Number"
                                        value="<?php echo $account[0]['accountNumber'] ?>" required><br>
                                    <input type="text" name="branch" class="" placeholder="Branch"
                                        value="<?php echo $account[0]['branch'] ?>" required><br>
                                    <input type="text" name="branch_code" class="" placeholder="Branch Code"
                                        value="<?php echo $account[0]['branchCode'] ?>" requierd><br>

                                    <button type="submit" name="edit_account_details_btn"
                                        class="btn uppercase">Submit</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require "footer.php"; ?>
    <script src="<?php echo JS ?>/app.js"></script>
    <script src="<?php echo JS ?>/tabs.js"></script>
    <script>

        const expandBtns = document.querySelectorAll(".actions>button")
        const expands = document.querySelectorAll(".expand")
        const icons = document.querySelectorAll(".actions>button>i")
        Array.from(expandBtns).forEach(expandBtn => {

            expandBtn.addEventListener("click", () => {
                let id = expandBtn.getAttribute("for")

                Array.from(icons).forEach(icon => {
                    icon.removeAttribute("show")
                })

                Array.from(expands).forEach(expand => {
                    if (expand.id == id) {
                        expand.toggleAttribute("show")
                        if (expand.hasAttribute("show")) {
                            expandBtn.children[0].setAttribute("show", null)
                        }
                    } else {
                        expand.removeAttribute("show")
                    }
                })

            })
        })
    </script>
    <script>
        var edit_detials_modal = document.getElementById("edit_detials_modal");
        var add_account_detials_modal = document.getElementById("add_account_detials_modal");
        var edit_account_detials_modal = document.getElementById("edit_account_detials_modal");
        var add_qualification_detials_modal = document.getElementById("add_qualification_detials_modal");
        var edit_qualification_detials_modal = document.getElementById("edit_qualification_detials_modal");

        var edit_details_btn = document.getElementById("edit_details");
        var add_account_details_btn = document.getElementById("add_account_details");
        var edit_account_details_btn = document.getElementById("edit_account_details");
        console.log(edit_account_details_btn);
        var add_qualification_details_btn = document.getElementById("add_qualification_details");
        var edit_qualification_details_btn = document.getElementById("edit_qualification_details");

        var span1 = document.getElementsByClassName("close_modal1")[0];
        var span2 = document.getElementsByClassName("close_modal_add_account")[0];
        var span3 = document.getElementsByClassName("close_modal_edit_account")[0];
        var span4 = document.getElementsByClassName("close_modal_add_qualifications")[0];
        var span5 = document.getElementsByClassName("close_modal_edit_qualifications")[0];

        edit_details_btn.onclick = function () {
            edit_detials_modal.style.display = "block";
        }

        if (add_account_details_btn != null) {
            add_account_details_btn.onclick = function () {
                add_account_detials_modal.style.display = "block";
            }
        }

        if (edit_account_details_btn != null) {
            edit_account_details_btn.onclick = function () {
                edit_account_detials_modal.style.display = "block";
            }
        }

        if (add_qualification_details_btn != null) {
            add_qualification_details_btn.onclick = function () {
                add_qualification_detials_modal.style.display = "block";
            }
        }
        if (edit_qualification_details_btn != null) {

            edit_qualification_details_btn.onclick = function () {
                edit_qualification_detials_modal.style.display = "block";
            }
        }

        span1.onclick = function () {
            edit_detials_modal.style.display = "none";
        }

        span2.onclick = function () {
            add_account_detials_modal.style.display = "none";
        }

        span3.onclick = function () {
            edit_account_detials_modal.style.display = "none";
        }

        span4.onclick = function () {
            add_qualification_detials_modal.style.display = "none";
        }

        span5.onclick = function () {
            edit_qualification_detials_modal.style.display = "none";
        }

        window.onclick = function (event) {
            if (event.target == modal) {
                edit_detials_modal.style.display = "none";
                add_account_detials_modal.display = "none";
                edit_account_detials_modal.display = "none";
                add_qualification_detials_modal.display = "none";
                edit_qualification_detials_modal.display = "none";
            }
        }
    </script>





</body>

</html>