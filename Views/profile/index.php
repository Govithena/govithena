<!DOCTYPE html>
<html lang="en">
<?php

function render_stars($stars, $outof)
{
    for ($i = 1; $i <= $outof; $i++) {
        if ($i <= $stars) {
            echo '<i class="fas fa-star glow"></i>';
        } else {
            echo '<i class="fas fa-star"></i>';
        }
    }
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Farmer</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">

    <link rel="stylesheet" href="<?php echo CSS ?>base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>profile/index.css">
</head>


<body>
    <?php require_once(COMPONENTS . "navbar.php");
    ?>
    <div class="[ container ][ heading ]" container-type="section">

        <div class="[ top ]">
            <div class="[ left ]">
                <div class="user__profile">
                    <div class="picture__name">
                        <div class="picture">
                            <img src="<?php echo UPLOADS . $user['image'] ?>" alt="">
                        </div>
                        <div class="name">
                            <h1><?php echo $user['firstName'] . " " . $user['lastName'] ?></h1>
                            <p class="type"><?php echo strtolower($user['userType']) ?> from <?php echo $user['city'] ?></p>
                        </div>
                    </div>
                    <!-- <button class="button__primary">Contact</button> -->
                </div>
                <div class="preformance">
                    <div class="cards">
                        <div class="card">
                            <small>Worked with </small>
                            <p>3</p>
                            <small>Investors</small>
                        </div>
                        <div class="card">
                            <small>Invested Over </small>
                            <p class="[ LKR ]"><?php echo number_format('10000.00', 0, '', ',') ?>+</p>
                            <small>From Investors</small>
                        </div>
                        <div class="card">
                            <small>Overall Score </small>
                            <p>4.5</p>
                            <small>out of 5</small>
                        </div>
                    </div>
                    <div class="progress">
                        <h1>Preformance</h1>
                        <div class="[ grid ]" sm="1" md="2" gap="1">
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Quality of Work</p>
                                    <p>80%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: 50%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Communication</p>
                                    <p>80%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: 40%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Expertise</p>
                                    <p>80%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: 67%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Professionalism</p>
                                    <p>80%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: 48%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Quality of Work</p>
                                    <p>80%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: 90%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Communication</p>
                                    <p>80%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: 80%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Expertise</p>
                                    <p>80%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: 76%;"></div>
                                </div>
                            </div>
                            <div class="progress__bar">
                                <div class="progress__details">
                                    <p>Professionalism</p>
                                    <p>80%</p>
                                </div>
                                <div class="bar">
                                    <div class="fill" style="--value: 50%;"></div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <div class="[ right ]">
                <div class="personal__details">
                    <h1>Personal Details</h1>
                    <ul class="items">
                        <li class="item">
                            <i class="bi bi-envelope-at"></i>
                            <div>
                                <p class="email"><?php echo $user['username'] ?></p>
                                <small>Email Address</small>
                            </div>
                        </li>
                        <li class="item">
                            <i class="bi bi-phone"></i>
                            <div>
                                <p class="email"><?php echo $user['phoneNumber'] ?></p>
                                <small>Phone Number</small>
                            </div>
                        </li>
                        <li class="item">
                            <i class="bi bi-signpost-split"></i>
                            <div>
                                <p>
                                    <?php
                                    echo $user['addressLine1'] .
                                        "<br>" . $user['addressLine2'] .
                                        "<br>" . $user['city'];
                                    ?>
                                </p> <small>Address</small>
                            </div>
                        </li>
                        <li class="item">
                            <i class="bi bi-geo"></i>
                            <div>
                                <p><?php echo $user['district'] ?></p>
                                <small>District</small>
                            </div>
                        </li>
                        <li class="item">
                            <i class="bi bi-translate"></i>
                            <div>
                                <p><?php echo "Sinhala, English" ?></p>
                                <small>Languages</small>
                            </div>
                        </li>
                        <li class="item">
                            <i class="bi bi-tree"></i>
                            <div>
                                <p><?php echo "Fruits" ?></p>
                                <small>Categories</small>
                            </div>
                        </li>
                        <li class="item">
                            <i class="bi bi-calendar"></i>
                            <div>
                                <p><?php echo "2 months ago, on 12/15/2022" ?></p>
                                <small>Joined Date</small>
                            </div>
                        </li>
                    </ul>

                    <div class="buttons">
                        <button class="button__primary-invert">Contact Farmer</button>
                        <button class="button__primary">Send a message</button>
                    </div>
                </div>
            </div>

        </div>

        <div class="reviews">
            <h1>Reviews</h1>
        </div>


















        <!-- 
        <div class="[ heading__content ]">
            <div class="[ cover__img ]">
                <img src="<?php echo IMAGES; ?>/placeholder.jpg" alt="">
            </div>
            <div class="[ cover__content ]">
                <div class="[ profile__img ]">
                    <img src="<?php echo UPLOADS . $user['image'] ?>" alt="">
                </div>
                <div class="[ grid ]" sm="4" gap="1">
                    <span class="[ profile__back ]"></span>
                    <div class="[ user__details ]">
                        <h1><?php echo $user['firstName'] . " " . $user['lastName'] ?></h1>
                        <p class="type"><?php echo strtolower($user['userType']) ?></p>
                        <div class="[ flex-row ]">
                            <a>
                                <i class="fa fa-phone"></i>
                                <p><?php echo $user['phoneNumber'] ?></p>
                            </a>
                            <a>
                                <i class="fa fa-envelope"></i>
                                <p><?php echo $user['username'] ?></p>
                            </a>
                        </div>
                    </div>
                    <i class="fa fa-bookmark"></i>
                </div>
            </div>
            <div>
                <h2>Description</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non sapiente quis recusandae rerum, quo id molestias minima! Facilis molestiae facere optio natus beatae deserunt ratione et quo deleniti, consequatur assumenda.</p>
            </div>
        </div> -->

        <!-- <div class="[ additional__details ]">
            <h2>Additional Details</h2>
            <ul>
                <li>
                    <i class="fa fa-envelope"></i>
                    <div>
                        <p class="[ li__heading ]">Email</p>
                        <p><?php echo $user['username'] ?></p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-map-marker"></i>
                    <div>
                        <p class="[ li__heading ]">Address</p>
                        <p>
                            <?php
                            echo $user['addressLine1'] .
                                "<br>" . $user['addressLine2'] .
                                "<br>" . $user['city'];
                            ?>
                        </p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-building"></i>
                    <div>
                        <p class="[ li__heading ]">District</p>
                        <p><?php echo $user['district'] ?></p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-language"></i>
                    <div>
                        <p class="[ li__heading ]">Language</p>
                        <p>English</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-tree"></i>
                    <div>
                        <p class="[ li__heading ]">Work History</p>
                        <p>Vegetables, Fruits</p>
                    </div>
                </li>
                <li>
                    <i class="fa fa-calendar"></i>
                    <div>
                        <p class="[ li__heading ]">Join Date</p>
                        <p>2 months ago, on 12/15/2022</p>
                    </div>
                </li>
            </ul>
        </div> -->
    </div>
    <?php

    if (!empty($gigs)) {
    ?>
        <div class="[ container ]" type="section">
            <h2> Active Gigs</h2>
            <div class="[ my-2 ] [ grid ]" gap="1" md="2" lg="4">
                <?php
                foreach ($gigs as $gig) {
                ?>
                    <div class="[ result__card ]">
                        <p class="category__tag"><?php echo $gig["category"] ?></p>
                        <div class="[ card__img ]">
                            <img src="<?php echo UPLOADS . $gig['thumbnail'] ?>" alt="test" />
                        </div>
                        <div class="[ card__content ]">

                            <div class="[ flex-row ]">
                                <a class="[ card__link ]" href="<?php echo URLROOT . "/gig/" . $gig['gigId'] ?>">
                                    <?php echo $gig['title'] ?>
                                </a>
                                <div>
                                    <small>Capital :</small>
                                    <p class="[ ]">LKR <?php echo $gig['capital'] ?></p>
                                </div>
                            </div>
                            <div class="[ flex-row ]">
                                <div>
                                    <small>Location :</small>
                                    <p><?php echo $gig['city'] ?></p>
                                </div>
                                <div>

                                    <small>Time Period :</small>
                                    <p><?php echo $gig["cropCycle"] ?> Days</p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>

            </div>
        </div>
    <?php
    }
    ?>

    <div class="[ container ]" type="section">
        <?php
        if (isset($farmerAvgStars) || isset($stars) || isset($noOfReviews)) {
        ?>
            <div class="[ rating__grid ]">
                <div class="[ rating__number ]">
                    <h1><?php echo $farmerAvgStars ?></h1>
                    <div class="[ stars ]">
                        <?php render_stars($farmerAvgStars, 5); ?>
                    </div>
                    <p><?php echo $noOfReviews ?> reviews</p>
                </div>
                <div class="[ rating__bars ]">
                    <div class="[ bar ]">
                        <label for="5">5</label>
                        <progress id="5" value="<?php echo $stars['5'] ?>" max="100"></progress>
                    </div>
                    <div class="[ bar ]">
                        <label for="4">4</label>
                        <progress id="4" value="<?php echo $stars['4'] ?>" max="100"></progress>
                    </div>
                    <div class="[ bar ]">
                        <label for="3">3</label>
                        <progress id="3" value="<?php echo $stars['3'] ?>" max="100"></progress>
                    </div>
                    <div class="[ bar ]">
                        <label for="2">2</label>
                        <progress id="2" value="<?php echo $stars['2'] ?>" max="100"></progress>
                    </div>
                    <div class="[ bar ]">
                        <label for="1">1</label>
                        <progress id="1" value="<?php echo $stars['1'] ?>" max="100"></progress>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

        <div class="[ reviews ]">
            <h1>Reviews</h1>
            <hr>
            <div class="[ reviews__wrapper ]">
                <?php
                if (!isset($reviews) && empty($reviews)) {
                    require(COMPONENTS . "dashboard/noDataFound.php");
                } else {
                    foreach ($reviews as $review) {
                ?>
                        <div class="[ review ]">
                            <div class="[ review__header ]">
                                <img src="<?php echo UPLOADS . $review['image'] ?>" alt="profile">
                                <h3><?php echo $review['firstName'] . " " . $review['lastName'] ?></h3>
                            </div>
                            <p><?php echo $review['q9'] ?></p>
                            <div class="[ review__footer ]">
                                <p><?php echo $review['timestamp'] ?></p>
                                <div class="[ stars ]">
                                    <?php render_stars($review['q1'], 5); ?>
                                    <!-- <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i> -->
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php
    require COMPONENTS . "footer.php";
    ?>
    <script type="text/javascript" src="<?php echo JS ?>navbar/navbar.js"></script>
</body>

</html>