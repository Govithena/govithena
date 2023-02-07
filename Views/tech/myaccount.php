<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="../Webroot/css/sidebar.css">
    <link rel="stylesheet" href="../Webroot/css/ui.css">
    <link rel="stylesheet" href="../Webroot/css/tech/myaccount.css">
    <link rel="stylesheet" href="../Webroot/css/dashHeader.css">
    <link rel="stylesheet" href="../Webroot/css/dashFooter.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php include COMPONENTS . 'dashboard/header.php'; ?>

    <?php include 'sidebar.php'; ?>
    <div class="dashboard-container h-screen" style="margin-bottom: 200px">
        <div class="[ profile_continer ]">

            <div class="[ profile_wrapper ]">


                <div class="[ profile_card bg-light ]">
                    <div class="[ profile_img ]">
                        <img src="<?php echo IMAGES ?>/farmer.jpeg" alt="">
                    </div>
                    <form action="<?php echo URLROOT . '/tech/requests/' . $request['requestId'] . '/' ?>"
                        method="POST">
                        <div class="flex flex-row " style="width: 800px">
                            <div class="[ profile_content ]">


                                <?php echo "<h1>" . $agrologist[0]['firstName'] . " " . $agrologist[0]['lastName'] . "</h1>"; ?>

                                <?php echo "<h4>" . ucwords($agrologist[0]['userType']) . "</h4>"; ?>
                                <p class="flex flex-row">
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
                                </p>

                            </div>
                            <div class="flex flex-row flex-c-c" style="width: 200px;margin-top: 110px">
                                <a href="#" class="btn uppercase fs-4 btn-primary " id="edit_details">Edit Profile</a>
                            </div>
                            <!-- <div class="flex flex-row flex-c-c">
                                <button class="btn btn-primary mr-2" name="accept">Accept</button>
                            </div> -->
                        </div>
                    </form>
                </div>

            </div>

        </div>
        <div class="content ff-poppins" style="background-color: white; margin-bottom: 100px">
            <div class="p-2">
                <div class="fs-6">Personal Details</div>
                <hr>

                <div style="color: grey" class="pt-1">First Name</div>
                <?php echo "<div>" . ucwords($agrologist[0]['firstName']) . "</div>"; ?>
                <div style="color: grey" class="pt-1">Last Name</div>
                <?php echo "<div>" . ucwords($agrologist[0]['lastName']) . "</div>"; ?>
                <div style="color: grey" class="pt-1">Email</div>
                <?php echo "<div>" . strtolower($agrologist[0]['username']) . "</div>"; ?>
                <div style="color: grey" class="pt-1">NIC</div>
                <?php echo "<div>" . $agrologist[0]['NIC'] . "</div>"; ?>
                <div style="color: grey" class="pt-1">Mobile Number</div>
                <?php echo "<div>" . $agrologist[0]['phoneNumber'] . "</div>"; ?>
                <div style="color: grey" class="pt-1">City</div>
                <?php echo "<div>" . ucwords($agrologist[0]['city']) . "</div>"; ?>


                <div id="edit_detials_modal" class="modal">

                    <div class="modal-content">
                        <span class="close close_modal1">&times;</span>
                        <h3>Edit Details</h3>
                        <form class="form pt-1" action="<?php echo URLROOT ?>/agrologist/myaccount" method="post">

                            <input type="text" name="firstName" class="" placeholder=""
                                value="<?php echo $agrologist[0]['firstName'] ?>"><br>
                            <input type="text" name="lastName" class="" placeholder=""
                                value="<?php echo $agrologist[0]['lastName'] ?>"><br>
                            <input type="text" name="city" class="" placeholder=""
                                value="<?php echo $agrologist[0]['city'] ?>"><br>
                            <input type="text" name="phoneNumber" class="" placeholder=""
                                value="<?php echo $agrologist[0]['phoneNumber'] ?>"><br>
                            <button type="submit" name="edit_details_btn" class="btn uppercase"
                                onclick="alert('Succesffully updated');">Edit details</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>
        <script>
            var modal = document.getElementById("myModal");
            var edit_detials_modal = document.getElementById("edit_detials_modal");

            var edit_details_btn = document.getElementById("edit_details");

            var span1 = document.getElementsByClassName("close_modal1")[0];

            edit_details_btn.onclick = function () {
                edit_detials_modal.style.display = "block";
            }

            span1.onclick = function () {
                edit_detials_modal.style.display = "none";
            }

            window.onclick = function (event) {
                if (event.target == modal) {
                    edit_detials_modal.style.display = "none";
                }
            }

        </script>
    </div>


    <?php require COMPONENTS . "dashboard/footer.php"; ?>
    <script src="<?php echo JS ?>/app.js"></script>

</body>

</html>