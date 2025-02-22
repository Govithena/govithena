<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/table.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/gigs.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/farmer/progressUpdate.css">

    <title>Dashboard | Farmer</title>
</head>

<body>

    <?php
    $datadata = $notifications;

    // var_dump($progress); die();

    $active = "progress";
    $title = "Progress";
    require_once("navigator.php");
    ?>


    <div class="[ container ][ gigs ]" container-type="dashboard-section">
        <div class="btn_wrapper">
            <h2>Progress</h2>
        </div>



        <div class="grid__table" style="
                                --xl-cols: 0.7fr 1.5fr 0.9fr 0.7fr 0.5fr 0.5fr;
                            ">
            <div class="head">
                <div class="row">
                    <div class="data">
                        <p></p>
                    </div>
                    <div class="data remove-border">
                        <p>Farmer Name</p>
                    </div>
                    <div class="data">
                        <p>Initial Investment</p>
                    </div>
                    <div class="data">
                        <p>Location</p>
                    </div>
                    <div class="data">
                        <p>Status</p>
                    </div>
                    <div class="data">
                        <p>Land Area</p>
                    </div>
                    <!-- <div class="data">
                                    <p>Description</p>
                                </div> -->
                </div>
            </div>
            <div class="body">
                <div class="row">
                    <div class="data farmer__">
                        <div class="farmerimg">
                            <img src="<?php echo UPLOADS . '/' . $gig['thumbnail'] ?>" alt="Picture">
                        </div>
                    </div>
                    <div class="data ">
                        <div class="namecol">
                            <h1>
                                <p><?php echo $gig['title'] ?></p>
                            </h1>
                            <p><?php echo $gig['category'] ?></p>
                        </div>
                    </div>
                    <div class="data">
                        <p class="LKR"><?php echo number_format($gig['capital'], 2, '.', ',') ?></p>
                    </div>
                    <div class="data">
                        <p><?php echo $gig['city'] ?></p>
                    </div>
                    <div class="data">
                        <p><?php echo $gig['status'] ?></p>
                    </div>
                    <div class="data">
                        <p><?php echo $gig['landArea'] ?></p>
                    </div>
                    <!-- <div class="data">
                                    <p><?php echo $gig['description'] ?></p>
                                </div> -->
                    <div class="data flex-right">
                        <div class="actions">
                            <!-- <a href="#" class="btn btn-primary">View Progress</a> -->
                            <!-- <button onclick="openAcceptModal('<?php echo $gig['gigId'] ?>')" class="button__primary">Accept</button> -->
                            <!-- <button onclick="openRejectModal('<?php echo $gig['gigId'] ?>')" class="button__danger">Reject</button> -->
                            <!-- <a href="<?php echo URLROOT . "/farmer/deleteGig/" . $gig['gigId'] ?>" class="btn btn-danger">Delete</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="btn_wrapper btnposi">
            <a class="btn btn-primary" href="<?php echo URLROOT ?>/farmer/newProgress/<?php echo $gig['gigId'] ?>">Add New</a>
        </div>
        <?php
        foreach ($progress as $pr) {
        ?>
            <h3>
                <p><?php echo $pr['date'] ?></p>
            </h3>

            <div class="imgrow">
                <?php
                foreach ($pr['images'] as $img) {
                ?>
                    <div class="proimgframe">
                        <img src="<?php echo UPLOADS . '/progress/' . $img ?>">
                    </div>
                <?php
                }
                ?>
            </div>

            <br>
            <h3>
                <p><?php echo $pr['subject'] ?></p>
            </h3>
            <p><?php echo $pr['description'] ?></p>
            <hr>
        <?php
        }
        ?>


    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>