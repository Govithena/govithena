<?php

$currentUser = Session::get('user');

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
    <div class="[ container ]" container-type="dashboard-section">
        <div class="[ open__btn ]">
            <button onclick="openSidebar()">
                <i class="fa-solid fa-bars"></i>
            </button>
        </div>
        <?php
        if (isset($title)) {
        ?>
            <p class="[ page__title ]"><?php echo $title; ?></p>
        <?php
        }
        ?>

        <div class="[ profile ]">
            <?php if (isset($currentUser)) { ?>
                <div class="[ buttons ]">
                    <div class="[ notification ]">
                        <button>
                            <i class="[ fa-solid fa-bell ]"></i>
                            <?php
                            $notificationCount = 4;
                            if (isset($notificationCount)) {
                            ?>
                                <span><?php echo $notificationCount ?></span>
                            <?php
                            }
                            ?>
                        </button>
                    </div>

                    <span></span>

                    <button onclick="toggleProfileMenu()">
                        <div class="[ image ]">
                            <img src="<?php echo IMAGES ?>/21.jpg" alt="profile">
                        </div>
                    </button>
                </div>

                <div id="profile_menu" open="false" class="[ menu ]">
                    <ul>
                        <li><a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/dashboard/">
                                <i class="[ fa-solid fa-gauge ]"></i>Dashboard
                            </a></li>
                        <li><a onclick="toggleProfileMenu()" href="<?php echo URLROOT ?>/profile">
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
            <img src="<?php echo IMAGES ?>/logo.svg" alt="logo">
        </a>
        <div class="[ action__btn ]">
            <button onclick="closeSidebar()">&times;</button>
        </div>
    </div>

    <div class="[ links ]">
        <ul>
            <li>
                <a href="<?php echo URLROOT ?>/tech/dashboard" class="<?php highlight($active, "dashboard") ?>">
                    <i class="fa-solid fa-gauge"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/tech/requests" class="<?php highlight($active, "requests") ?>">
                    <i class="[ fa-solid fa-sack-dollar ]"></i>
                    <p>Requests</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/tech/farmers" class="<?php highlight($active, "farmers") ?>">
                    <i class="[ fa-solid fa-sack-dollar ]"></i>
                    <p>Farmers</p>
                </a>
            </li>
        </ul>
        <div class="[ grow ]"></div>
        <ul>
            <li>
                <a href="<?php echo URLROOT ?>/tech/myaccount" class="<?php highlight($active, "myaccount") ?>">
                    <i class="[ fa-solid fa-user-tie ]"></i>
                    <p>My Account</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/help" class="<?php highlight($active, "help") ?>">
                    <i class="[ fa-solid fa-circle-question ]"></i>
                    <p>Help</p>
                </a>
            </li>
            <li>
                <a href="<?php echo URLROOT ?>/tech/settings" class="<?php highlight($active, "settings") ?>">
                    <i class="[ fa-solid fa-gear ]"></i>
                    <p>Settings</p>
                </a>
            </li>
        </ul>

    </div>
</aside>