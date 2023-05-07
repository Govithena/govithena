<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/progressBar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/alertModal.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/gigs.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    if (Session::has('farmer_review_by_investor_alert')) {
        $alert = Session::pop('farmer_review_by_investor_alert');
        $alert->show_default_alert();
    }
    if (Session::has('gig_mark_as_under_review_alert')) {
        $alert = Session::pop('gig_mark_as_under_review_alert');
        $alert->show_default_alert();
    }
    ?>



    <dialog id="confirmModal" class="[ alertModal ]">
        <div class="[ container ]">
            <i class="bi bi-x-circle"></i>
            <div class="[ content ]">
                <h2>Are you sure?</h2>
                <p>Do you really want to mark this gig as completed? This process can't be undone.</p>
            </div>
            <form id="deleteForm" action="<?php echo URLROOT ?>/dashboard/gig_mark_as_under_review" method="POST" class="[ buttons ]">
                <button type="button" class="[ button__primary ]" onclick="closeConfirmModal()" data-dismiss="modal">No, Cancel</button>
                <button id="confirmGigCompletionBtn" name="gigId" type="submit" class="[ button__danger ]">Yes, Confirm</button>
            </form>
        </div>
    </dialog>

    <?php
    $active = "gigs";
    $title = "Gigs";
    require_once("navigator.php");
    ?>

    <div class="[ container ]" container-type="dashboard-section">

        <div class="[ caption ]">
            <h3>Track the progress of your gigs with ease!</h3>
            <p>Your active gigs are just a click away! Easily view your current projects and stay up-to-date on their progress with our intuitive dashboard.</p>
        </div>

        <div class="[ gigs ]">
            <div>
                <div class="[ grid ][ cards ]" sm="1" md="2" gap="1">
                    <div class="[ card ]">
                        <div class="[ icon ]">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="[ details ]">
                            <h2><?php
                                if (isset($activeGigCount)) echo $activeGigCount;
                                else echo 0;
                                ?></h2>
                            <p>Active Gigs</p>
                        </div>
                    </div>
                    <div class="[ card ]">
                        <div class="[ icon ]">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="[ details ]">
                            <h2><?php
                                if (isset($completedGigCount)) echo $completedGigCount;
                                else echo 0;
                                ?></h2>
                            <p>Completed Gigs</p>
                        </div>
                    </div>
                    <div class="[ card ]">
                        <div class="[ icon ]">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="[ details ]">
                            <h2><small>LKR</small><br>
                                <?php
                                if (isset($totalInvestment)) echo number_format($totalInvestment, 2, '.', ',');
                                else echo "0.00";
                                ?></h2>
                            <p>Total Investments</p>
                        </div>
                    </div>
                    <div class="[ card ]">
                        <div class="[ icon ]">
                            <i class="bi bi-bell"></i>
                        </div>
                        <div class="[ details ]">
                            <h2><small>LKR</small><br>
                                <?php
                                if (isset($totalInvestment)) echo number_format($totalInvestment, 2, '.', ',');
                                else echo "0.00";
                                ?></h2>
                            <p>Total Profit</p>
                        </div>
                    </div>
                </div>
                <div class="[ special__announcment ]">
                    <div class="[ icon ]">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div class="[ details ]">
                        <h3>Special Announcment</h3>
                        <p>Our platform is currently undergoing maintenance. We will be back online shortly. Thank you for your patience.</p>
                    </div>
                </div>
            </div>
            <div class="[ activities ]">
                <div class="[ title ]">
                    <h3>Recent Activities</h3>
                </div>
                <?php
                if (!isset($recentActivities) || empty($recentActivities)) {
                    require(COMPONENTS . "dashboard/noDataFound.php");
                } else {
                    foreach ($recentActivities as $ra) {
                ?>
                        <div class="[ activity ]">
                            <!-- <div class="[ icon ]">
                                <i class="bi bi-bell"></i>
                            </div> -->
                            <div class="[ details ]">
                                <h5><?php echo ucwords($ra['type']) ?></h5>
                                <?php
                                if ($ra['type'] == 'INVESTMENT') {
                                ?>
                                    <p>You have invested <strong class="LKR"><?php echo number_format($ra['amount'], 2, '.', ',') ?></strong> in <strong class="limit-text-1"><?php echo $gigTitles[$ra['gigId']] ?></strong></p>
                                <?php
                                }

                                ?>
                                <div class="[ time ]">
                                    <p><?php echo $ra['timestamp'] ?></p>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                }
                ?>


            </div>
        </div>

        <div class="[ tabs ][ gigTabs ]" tab="2">
            <div class="controls">
                <button class="control" for="1" active>Active Gigs</button>
                <button class="control" for="2">To Review</button>
                <button class="control" for="3">Completed Gigs</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1" active="true">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Active Gigs</h2>
                            <p>Keep your eyes on the prize by tracking progress with ease.</p>
                        </div>
                        <?php
                        if (!isset($activeGigs) || empty($activeGigs)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="active__gigs">
                                <?php
                                foreach ($activeGigs as $activeGig) {
                                ?>
                                    <div class="active__gig">

                                        <div class="active__gig_img">
                                            <img src="<?php echo UPLOADS . $activeGig['thumbnail'] ?>" />
                                            <div class="active__gig_farmer">
                                                <div class="img">
                                                    <img src="<?php echo UPLOADS . $activeGig['image'] ?>" />
                                                </div>
                                                <div class="details">
                                                    <a href="<?php echo URLROOT . "/profile/" . $activeGig['farmerId'] ?>"><?php echo $activeGig['firstName'] . " " . $activeGig['lastName'] ?></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="">
                                            <?php
                                            if ($activeGig['status'] == "UNDER_COMPLETION") {
                                            ?>
                                                <div class="completion__msg">
                                                    <p>The gig has been marked as completed by the farmer. Confirm to proceed with the next steps.</p>
                                                    <button onclick="openConfirmModal('<?php echo $activeGig['gigId'] ?>')" class="button__primary">Confirm</button>
                                                </div>
                                            <?php
                                            }
                                            ?>
                                            <div class="active__gig_content">
                                                <div class="active__gig_title">
                                                    <h3 class=""><?php echo $activeGig['title'] ?></h3>
                                                    <p><?php echo $activeGig['city'] ?></p>
                                                </div>
                                                <div class="grid active__gig_progress_bars" lg="2" gap="1">
                                                    <div class="progress__bar">
                                                        <div class="progress__details">
                                                            <p><?php echo $daysSinceStarted[$activeGig['gigId']] ?> Days out of <?php echo $activeGig['cropCycle'] ?> Days</p>
                                                        </div>
                                                        <div class="bar">
                                                            <div class="fill" style="--value: <?php echo ceil(($daysSinceStarted[$activeGig['gigId']] / $activeGig['cropCycle']) * 100) ?>%;"></div>
                                                        </div>
                                                    </div>
                                                    <div class="progress__bar">
                                                        <div class="progress__details">
                                                            <p>Progress</p>
                                                            <p><?php echo $progressCounts[$activeGig['gigId']] ?> / 10</p>
                                                        </div>
                                                        <div class="bar">
                                                            <div class="fill" style="--value: <?php echo ceil($progressCounts[$activeGig['gigId']] * 10) ?>%;"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="active__gig_other">
                                                    <div class="item">
                                                        <small>Total Investments</small>
                                                        <p class="LKR"><?php
                                                                        if (isset($totalInvestmentPerGig[$activeGig['gigId']])) {
                                                                            echo number_format($totalInvestmentPerGig[$activeGig['gigId']], 2, '.', ',');
                                                                        }
                                                                        ?></p>
                                                    </div>
                                                    <div class="item">
                                                        <small>Progress Updates</small>
                                                        <p><?php echo $progressCounts[$activeGig['gigId']] ?></p>
                                                    </div>
                                                    <div class="item">
                                                        <small>Agrologist updates</small>
                                                        <p><?php echo $agrologistProgressCount[$activeGig['gigId']] ?></p>
                                                    </div>
                                                    <span class="grow"></span>
                                                    <a href="<?php echo URLROOT . "/dashboard/gig/" . $activeGig['gigId'] ?>" class="button__primary">View More</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="tab" id="2">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>To Review</h2>
                            <p>Keep your eyes on the prize by tracking progress with ease.</p>
                        </div>
                        <?php
                        if (!isset($toReviewGigs) || empty($toReviewGigs)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="mt-1">
                                <div class="[ grid__table ]" style="
                                    --xl-cols: 0.75fr 3fr 1.5fr 1fr;
                                ">
                                    <div class="head">
                                        <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Gig</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Title</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Farmer</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <?php
                                        foreach ($toReviewGigs as $gig) {
                                        ?>
                                            <div class="row">
                                                <div class="data">
                                                    <div class="review__card">
                                                        <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>" />
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <h3><?php echo $gig['title'] ?></h3>
                                                </div>
                                                <div class="data">
                                                    <div class="table_farmer_image_and_name">
                                                        <div class="img">
                                                            <img src="<?php echo UPLOADS . '/profilePictures/' . $gig['image'] ?>" alt="">
                                                        </div>
                                                        <div class="name">
                                                            <p><?php echo $gig['firstName'] . ' ' . $gig['lastName'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="actions"><a href="<?php echo URLROOT . '/dashboard/review/' . $gig['gigId'] ?>" class="button__primary">Write a review</a></div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <div class="tab" id="3">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Completed Gigs</h2>
                            <p>Get a complete overview of your completed gigs and track your progress with just a few clicks!</p>
                        </div>
                        <?php
                        if (!isset($completedGigs) || empty($completedGigs)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="mt-1">
                                <div class="[ grid__table ]" style="
                                    --xl-cols: 0.75fr 3fr 1.5fr 1fr;
                                ">
                                    <div class="head">
                                        <div class="[ row ]">
                                            <div class="[ data ]">
                                                <p>Gig</p>
                                            </div>
                                            <div class="[ data ]" hideIn="md">
                                                <p>Title</p>
                                            </div>
                                            <div class="[ data ]" hideIn="lg">
                                                <p>Farmer</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="body">
                                        <?php
                                        foreach ($completedGigs as $gig) {
                                        ?>
                                            <div class="row">
                                                <div class="data">
                                                    <div class="review__card">
                                                        <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>" />
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <h3><?php echo $gig['title'] ?></h3>
                                                </div>
                                                <div class="data">
                                                    <div class="table_farmer_image_and_name">
                                                        <div class="img">
                                                            <img src="<?php echo UPLOADS . '/profilePictures/' . $gig['image'] ?>" alt="">
                                                        </div>
                                                        <div class="name">
                                                            <p><?php echo $gig['firstName'] . ' ' . $gig['lastName'] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="data">
                                                    <div class="actions"><a href="<?php echo URLROOT . '/dashboard/gig/' . $gig['gigId'] ?>" class="button__primary">View More</a></div>
                                                </div>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    if (isset($error)) {
        // require_once(COMPONENTS . "dashboard/noDataFound.php");
    } else {
        if (empty($withdrawls)) {
            // require_once(COMPONENTS . "dashboard/noDataFound.php");
        } else {
    ?>
            <div class="[ investments__container ]">
                <div class="[ investment__heading ]">
                    <h3>Title</h3>
                    <h3>Amount</h3>
                    <h3>Timestamp</h3>
                    <h3>Category</h3>
                </div>
                <?php
                foreach ($withdrawls as $withdrawl) {
                ?>
                    <div class="[ investment ]">
                        <h3><?php echo $withdrawl['title'] ?></h3>
                        <p><?php echo $withdrawl['amount'] ?></p>
                        <p><?php echo $withdrawl['timestamp'] ?></p>
                        <p><?php echo $withdrawl['category'] ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
    <?php
        }
    }
    ?>

    </div>
    <?php
    require_once("footer.php");
    ?>
    <script src="<?php echo JS ?>/main.js"></script>
    <script src="<?php echo JS ?>/tabs.js"></script>

    <script>
        function openConfirmModal(id) {
            const confirmModal = document.getElementById("confirmModal")
            const confirmGigCompletionBtn = document.getElementById("confirmGigCompletionBtn")
            confirmGigCompletionBtn.value = id
            confirmModal.showModal()
        }

        function closeConfirmModal() {
            const confirmModal = document.getElementById("confirmModal")
            confirmModal.close()
        }
    </script>
</body>

</html>