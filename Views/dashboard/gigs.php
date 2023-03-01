<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/grid.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tabs.css">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/gridTable.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/investor/gigs.css">

    <title>Dashboard | Investor</title>
</head>

<body>

    <?php
    $active = "gigs";
    $title = "Gigs";
    require_once("navigator.php");
    ?>

    <?php $name = "Janith"; ?>

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
                            <i class="[ fa fa-bell ]"></i>
                        </div>
                        <div class="[ details ]">
                            <h2>5</h2>
                            <p>Active Gigs</p>
                        </div>
                    </div>
                    <div class="[ card ]">
                        <div class="[ icon ]">
                            <i class="[ fa fa-bell ]"></i>
                        </div>
                        <div class="[ details ]">
                            <h2>5</h2>
                            <p>Completed Gigs</p>
                        </div>
                    </div>
                    <div class="[ card ]">
                        <div class="[ icon ]">
                            <i class="[ fa fa-bell ]"></i>
                        </div>
                        <div class="[ details ]">
                            <h2><small>LKR</small><br>1,250,000.00</h2>
                            <p>Total Investments</p>
                        </div>
                    </div>
                    <div class="[ card ]">
                        <div class="[ icon ]">
                            <i class="[ fa fa-bell ]"></i>
                        </div>
                        <div class="[ details ]">
                            <h2><small>LKR</small><br>50,000.00</h2>
                            <p>Total Profit</p>
                        </div>
                    </div>
                </div>
                <div class="[ special__announcment ]">
                    <div class="[ icon ]">
                        <i class="[ fa fa-bell ]"></i>
                    </div>
                    <div class="[ details ]">
                        <h3>Special Announcment</h3>
                        <p>Our platform is currently undergoing maintenance. We will be back online shortly. Thank you for your patience.</p>
                    </div>
                </div>
                <!-- <p class="[ freespace__text ]">Track your investment journey with ease by accessing all your active and completed gigs in one convenient location, where you can also generate detailed reports on your progress and achievements.</p> -->
            </div>
            <div class="[ activities ]">
                <div class="[ title ]">
                    <h3>Recent Activities</h3>
                </div>

                <div class="[ activity ]">
                    <div class="[ icon ]">
                        <i class="[ fa fa-bell ]"></i>
                    </div>
                    <div class="[ details ]">
                        <h5>Investment</h5>
                        <p>You have invested <strong>LKR 100,000.00</strong> in <strong>gig title</strong></p>
                        <div class="[ time ]">
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="[ activity ]">
                    <div class="[ icon ]">
                        <i class="[ fa fa-bell ]"></i>
                    </div>
                    <div class="[ details ]">
                        <h5>Investment</h5>
                        <p>You have invested <strong>LKR 100,000.00</strong> in <strong>gig title</strong></p>
                        <div class="[ time ]">
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="[ activity ]">
                    <div class="[ icon ]">
                        <i class="[ fa fa-bell ]"></i>
                    </div>
                    <div class="[ details ]">
                        <h5>Investment</h5>
                        <p>You have invested <strong>LKR 100,000.00</strong> in <strong>gig title</strong></p>
                        <div class="[ time ]">
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="[ activity ]">
                    <div class="[ icon ]">
                        <i class="[ fa fa-bell ]"></i>
                    </div>
                    <div class="[ details ]">
                        <h5>Investment</h5>
                        <p>You have invested <strong>LKR 100,000.00</strong> in <strong>gig title</strong></p>
                        <div class="[ time ]">
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>
                <div class="[ activity ]">
                    <div class="[ icon ]">
                        <i class="[ fa fa-bell ]"></i>
                    </div>
                    <div class="[ details ]">
                        <h5>Investment</h5>
                        <p>You have invested <strong>LKR 100,000.00</strong> in <strong>gig title</strong></p>
                        <div class="[ time ]">
                            <p>2 hours ago</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="[ tabs ][ gigTabs ]" tab="2">
            <div class="controls">
                <button class="control" for="1">Active Gigs</button>
                <button class="control" for="2">Completed Gigs</button>
            </div>
            <div class="wrapper">
                <div class="tab" id="1" active="true">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Active Gigs</h2>
                            <p>Keep your eyes on the prize by tracking progress with ease.</p>
                        </div>
                        <?php
                        if (!empty($ar)) {
                            require_once(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[  ]">
                                <div class="[ grid ][ filters ]" md="1" lg="2" gap="2">
                                    <div class="[ grid ][ options ]" sm="1" md="6" lg="6" gap="1">
                                        <div class="[ input__control ]">
                                            <label for="from">From :</label>
                                            <input id="from" type="date">
                                        </div>
                                        <div class="[ input__control ]">
                                            <label for="to">To :</label>
                                            <input id="to" type="date">
                                        </div>
                                        <div class="[ input__control ]">
                                            <label for="location">Location :</label>
                                            <select id="location">
                                                <option value="all">All</option>
                                                <option value="colombo">Colombo</option>
                                                <option value="galle">Galle</option>
                                                <option value="kandy">Kandy</option>
                                                <option value="matara">Matara</option>
                                                <option value="nuwaraeliya">Nuwara Eliya</option>
                                                <option value="trincomalee">Trincomalee</option>
                                            </select>
                                        </div>
                                        <div class="[ input__control ]">
                                            <label for="category">Category :</label>
                                            <select id="category">
                                                <option value="all">All</option>
                                                <option value="vegetable">Vegetable</option>
                                                <option value="fruit">Fruit</option>
                                                <option value="grains">Grains</option>
                                                <option value="spices">Spices</option>
                                            </select>
                                        </div>
                                        <div class="[ input__control ]">
                                            <button type="button">Apply</button>
                                        </div>

                                    </div>
                                    <div class="[ search ]">
                                        <input type="text" placeholder="Search">
                                        <button type="button">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>


                                <div class="[ grid__table ]" style="
                                        --xl-cols:  2fr 1fr 2fr 2fr 1fr;
                                        --lg-cols: 4fr 1fr 1fr;
                                        --md-cols: 5fr 1fr;
                                        --sm-cols: 3fr 1fr;
                                    ">
                                    <div class="[ head ]">
                                        <div class="[ data ]">
                                            <p>Gig</p>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <p>Category</p>
                                        </div>
                                        <div class="[ data ]" hideIn="lg">
                                            <p>Prograss</p>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($gigs as $gig) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img width="50" src="<?php echo UPLOADS . $gig['image'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . "/gig/" . $gig['gigId'] ?>">
                                                                <h2><?php echo $gig['title'] ?></h2>
                                                            </a>
                                                            <!-- <p><small>by </small> <a href="<?php echo URLROOT . "/profile/" . $request['uid'] ?>"><?php echo $request['firstName'] . " " . $request['lastName'] ?></p></a> -->
                                                            <h3><?php echo $gig['location'] ?></h3>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $gig['category'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <div class="[ progress__bar ]">
                                                        <label>
                                                            <span>Days</span>
                                                            <span>20 days out of 100 days</span>
                                                        </label>
                                                        <progress min="0" max="100" value="20"></progress>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <div class="[ progress__bar ]">
                                                        <label>
                                                            <span>overroll</span>
                                                            <span>50%</span>
                                                        </label>
                                                        <progress min="0" max="100" value="50"></progress>
                                                    </div>
                                                </div>
                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <a href="<?php echo URLROOT ?>/dashboard/progress/<?php echo $gig['gigId'] ?>" class="btn btn-primary">View More</a>
                                                    </div>
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

                <div class="tab" id="2">
                    <div class="[ requests__continer ]">
                        <div class="[ caption ]">
                            <h2>Completed Gigs</h2>
                            <p>Get a complete overview of your completed gigs and track your progress with just a few clicks!</p>
                        </div>
                        <?php
                        if (empty($pr)) {
                            require(COMPONENTS . "dashboard/noDataFound.php");
                        } else {
                        ?>
                            <div class="[ filters ]">
                                <div class="[ options ]">
                                    <div class="[ input__control ]">
                                        <label for="from">From :</label>
                                        <input id="from" type="date">
                                    </div>
                                    <div class="[ input__control ]">
                                        <label for="to">To :</label>
                                        <input id="to" type="date">
                                    </div>
                                    <div class="[ input__control ]">
                                        <label for="location">Location :</label>
                                        <select id="location">
                                            <option value="all">All</option>
                                            <option value="colombo">Colombo</option>
                                            <option value="galle">Galle</option>
                                            <option value="kandy">Kandy</option>
                                            <option value="matara">Matara</option>
                                            <option value="nuwaraeliya">Nuwara Eliya</option>
                                            <option value="trincomalee">Trincomalee</option>
                                        </select>
                                    </div>
                                    <div class="[ input__control ]">
                                        <label for="category">Category :</label>
                                        <select id="category">
                                            <option value="all">All</option>
                                            <option value="vegetable">Vegetable</option>
                                            <option value="fruit">Fruit</option>
                                            <option value="grains">Grains</option>
                                            <option value="spices">Spices</option>
                                        </select>
                                    </div>
                                    <div class="[ input__control ]">
                                        <button type="button">Apply</button>
                                    </div>

                                </div>
                                <div class="[ search ]">
                                    <input type="text" placeholder="Search">
                                    <button type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="[ requests__wrapper ]">
                                <div class="[ grid__table ]" style="
                                        --xl-cols:  1.2fr 0.35fr 0.35fr 0.35fr 0.35fr 0.4fr 0.7fr;
                                        --lg-cols: 1.5fr 0.5fr 0.5fr 1fr 1fr;
                                        --md-cols: 1fr 0.5fr 0.5fr;
                                        --sm-cols: 2fr 1fr;
                                    ">
                                    <div class="[ head ]">
                                        <div class="[ data ]">
                                            <p>Gig</p>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <p>Category</p>
                                        </div>
                                        <div class="[ data ]" hideIn="sm">
                                            <p>Offer</p>
                                        </div>
                                        <div class="[ data ]" hideIn="lg">
                                            <p>Time Period</p>
                                        </div>
                                        <div class="[ data ]" hideIn="lg">
                                            <p>Location</p>
                                        </div>
                                        <div class="[ data ]" hideIn="md">
                                            <p>Requested Date</p>
                                        </div>
                                    </div>
                                    <div class="[ body ]">
                                        <?php
                                        foreach ($pr as $request) {
                                        ?>
                                            <div class="[ row ]">
                                                <div class="[ data ]">
                                                    <div class="[ item__card ]">
                                                        <div class="[ img ]">
                                                            <img width="50" src="<?php echo UPLOADS . $request['image'] ?>" />
                                                        </div>
                                                        <div class="[ content ]">
                                                            <a href="<?php echo URLROOT . "/gig/" . $request['gigId'] ?>">
                                                                <h2><?php echo $request['title'] ?></h2>
                                                            </a>
                                                            <p><small>by </small> <a href="<?php echo URLROOT . "/profile/" . $request['uid'] ?>"><?php echo $request['firstName'] . " " . $request['lastName'] ?></p></a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                </div>
                                                <div class="[ data ]" hideIn="sm">
                                                    <h3>LKR <?php echo $request['offer'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['timePeriod'] ?> Months</h3>
                                                </div>
                                                <div class="[ data ]" hideIn="lg">
                                                    <h3><?php echo $request['location'] ?></h3>
                                                </div>
                                                <div class="[ data ]" hideIn="md">
                                                    <p><?php echo $request['requestedDate'] ?></p>
                                                </div>
                                                <div class="[ data ]">
                                                    <div class="[ actions ]">
                                                        <button for="<?php echo $request['requestId'] ?>"><i class="fa fa-chevron-circle-down"></i></button>
                                                        <a href="<?php echo URLROOT ?>/checkout/<?php echo $request['requestId'] ?>" class="btn btn-primary">Cancel Request</a>
                                                    </div>
                                                </div>
                                                <div id="<?php echo $request['requestId'] ?>" class="[ expand ]">

                                                    <div class="[ data ]" showIn="md">
                                                        <p class="[ tag ]"><?php echo $request['category'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="sm">
                                                        <h4>Offer :</h4>
                                                        <p>LKR <?php echo $request['offer'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Time Periold :</h4>
                                                        <p><?php echo $request['timePeriod'] ?> Months</p>
                                                    </div>
                                                    <div class="[ data ]" showIn="lg">
                                                        <h4>Location</h4>
                                                        <p><?php echo $request['location'] ?></p>
                                                    </div>
                                                    <div class="[ data ]" showIn="md">
                                                        <h4>Request Date</h4>
                                                        <p><?php echo $request['requestedDate'] ?></p>
                                                    </div>

                                                    <div class="[ data ]" always>
                                                        <h4>Your Message :</h4>
                                                        <p><?php echo $request['message'] ?></p>
                                                        <button class="btn btn-primary">Edit</button>
                                                    </div>
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
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
    <script>
        const controls = document.querySelectorAll(".controls>button");
        const tabs = document.querySelectorAll(".tab");

        Array.from(controls).forEach(control => {
            control.addEventListener("click", () => {
                let For = control.getAttribute("for")
                Array.from(tabs).forEach(tab => {
                    if (tab.id == For) {
                        tab.setAttribute("active", true)
                        control.toggleAttribute("active")
                    } else {
                        tab.setAttribute("active", false)
                    }
                })
            })
        })


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
</body>

</html>