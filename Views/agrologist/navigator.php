<?php

$currentUser = Session::get('user');
// $d = json_decode(file_get_contents('php://input'), true);

// if (empty(file_get_contents('php://input'))) {
//     echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>". 'no data found' . "</h1>";
// }
// $name = $d['name'];
// $n = $_POST['datadata'];
// $age = $d['age'];
// $greeting = "Hello, $n! You are $age years old.";
//echo "<h1 style='color: black; margin-top: 500px; margin-left: 1000px'>". $datadata[0]['message'] . "</h1>";

//echo "<h1 style='color: white'>$name</h1>";

function highlight($active, $link)
{
    if (isset($active)) {
        if ($active == $link) {
            echo "active";
        } else {
            echo "";
        }
    }
}

?>


<link rel="stylesheet" href="<?php echo CSS ?>/dashboard/navigator.css" type="text/css">

<nav class="[ nav ]">
    <div class="[ container ]" container-type="dashboard-navbar">

        <div class="[ logo ]">
            <a href="<?php echo URLROOT ?>/">
                <img src="<?php echo IMAGES ?>/logo.svg" alt="logo">
                <p>Govithena</p>
            </a>
        </div>
        <!-- <?php echo "<h1 style='color: white'>$name</h1>"; ?> -->
        <div class="[ open__btn ]">
            <button onclick="toggleSidebar()">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>

        <?php
        if (isset($title)) {
        ?>
            <p class="[ page__title ]">
                <?php echo $title; ?>
            </p>
        <?php
        }
        ?>

        <div class="[ profile ]">
            <?php if (isset($currentUser)) { ?>
                <div class="[ buttons ]">
                    <!-- <div class="[ notification ]">
                        <button onclick="toggleNotificationMenu()">
                            <i class="[ fa-solid fa-bell ]"></i>
                            <?php
                            $notificationCount = 4;
                            if (isset($notificationCount)) {
                            ?>
                                <span>
                                    <?php echo $notificationCount ?>
                                </span>
                                <?php
                            }
                                ?>
                        </button>
                    </div> -->

                    <span></span>

                    <button onclick="toggleProfileMenu()">
                        <div class="[ image ]">
                            <img src="<?php echo UPLOADS . '/' . Session::get('user')->getImage(); ?>" alt="profile" <?php echo DEFAULT_PROFILE_PICTURE ?>>
                        </div>
                    </button>
                </div>


                <div id="notification_menu" open="false" class="menu notification_menu ">
                    <div class="[ notification_message ]">
                        <?php
                        foreach ($notifications as $notification) {
                        ?>
                            <a>
                                <?php echo $notification['message']; ?>

                            </a>
                            <hr>
                        <?php
                        }
                        ?>
                        <!-- <small>
                            <?php echo $currentUser->getType() ?>
                        </small> -->
                    </div>
                    <!-- <ul>
                        <li><a onclick="toggleNotificationMenu()" href="<?php echo URLROOT ?>/dashboard/">
                                <i class="[ fa-solid fa-gauge ]"></i>Dashboard
                            </a></li>
                        <li><a onclick="toggleNotificationMenu()" href="<?php echo URLROOT ?>/profile">
                                <i class="[ fa-solid fa-user-tie ]"></i>Profile</a></li>
                        <li><a onclick="toggleNotificationMenu()" href="<?php echo URLROOT ?>/signout">
                                <i class="[ fa-solid fa-gear ]"></i>Settings</a>
                        </li>
                    </ul> -->
                    <!-- <a onclick="toggleNotificationMenu()" href="<?php echo URLROOT ?>/auth/signout">
                        <i class="fa-solid fa-right-from-bracket"></i>Sign Out</a> -->
                </div>





                <div id="profile_menu" open="false" class="[ menu ]">
                    <div class="[ profile__name ]">
                        <h3>
                            <?php echo $currentUser->getFirstName() ?>
                        </h3>
                        <small>
                            <?php echo $currentUser->getType() ?>
                        </small>
                    </div>
                    <ul>
                        <li><a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/agrologist/">
                                <i class="[ fa-solid fa-gauge ]"></i>Dashboard
                            </a></li>
                        <li><a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/agrologist/myaccount">
                                <i class="[ fa-solid fa-user-tie ]"></i>Profile</a></li>
                        <li><a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/signout">
                                <i class="[ fa-solid fa-gear ]"></i>Settings</a>
                        </li>
                    </ul>
                    <a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/auth/signout">
                        <i class="fa-solid fa-right-from-bracket"></i>Sign Out</a>
                </div>

            <?php } else { ?>
                <div class="[ signin__join ]">
                    <ul>
                        <li><a class="[ signin_btn ]" href="<?php echo URLROOT ?>/auth/signin">Sign In</a></li>
                        <li><a class="[ join_btn ]" href="<?php echo URLROOT ?>/auth/signup">Sign Up</a></li>
                    </ul>
                </div>
            <?php } ?>
        </div>

    </div>
</nav>

<aside class="[ sidebar ]">

    <div class="[ logo ]">
        <a href="<?php echo URLROOT ?>/">
            <h2>Govithena</h2>
            <img src="<?php echo IMAGES ?>/logo.svg" alt="logo">
        </a>
    </div>

    <div class="[ links ]">
        <ul>
            <li>
                <a href="<?php echo URLROOT . "/agrologist" ?>" class="<?php highlight($active, "dashboard") ?>">
                    <i class="fa-solid fa-gauge"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT . "/agrologist/farmers" ?>" class="<?php highlight($active, "farmers") ?>">
                    <i class="[ fa-solid fa-tractor ]"></i>
                    <p>Farmers</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT . "/agrologist/requests" ?>" class="<?php highlight($active, "requests") ?>">
                    <i class="[ fa-solid fa-tractor ]"></i>
                    <p>Requests</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT . "/agrologist/withdrawals" ?>" class="<?php highlight($active, "withdrawals") ?>">
                    <i class="[ fa-solid fa-sack-dollar ]"></i>
                    <p>Withdrawals</p>
                </a>
            </li>
        </ul>
        <div class="[ grow ]"></div>
        <ul>
            <li>
                <a href="<?php echo URLROOT . "/agrologist/myaccount" ?>" class="<?php highlight($active, "myaccount") ?>">
                    <i class="[ fa-solid fa-user-tie ]"></i>
                    <p>Account</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/help" class="<?php highlight($active, "help") ?>">
                    <i class="[ fa-solid fa-circle-question ]"></i>
                    <p>Help</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/settings" class="<?php highlight($active, "settings") ?>">
                    <i class="[ fa-solid fa-gear ]"></i>
                    <p>Settings</p>
                </a>
            </li>
        </ul>

    </div>
</aside>
<script src="<?php echo JS ?>/agrologist/navigator.js"></script>