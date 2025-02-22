<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agrologist | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="<?php echo IMAGES ?>/favicon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/base.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/ui.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/farmergigs.css">

    <link rel="stylesheet" href="<?php echo CSS ?>/grid.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/search.css">
    <link rel="stylesheet" href="<?php echo CSS ?>/agrologist/farmergigs.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
</head>

<body class="bg-gray h-screen">
    <?php
    $active = "farmers";
    require_once("navigator.php");
    ?>
    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <?php
        if ($gigDetails == null) {
            echo "<h1>Farmer Gigs</h1><hr>";
            require(COMPONENTS . "dashboard/noDataFound.php");
        } else {
            ?>
            <div class="flex flex-row flex-sb-c">
                <h1>
                    <?php echo $gigDetails[0]['firstName'] . " " . $gigDetails[0]['lastName'] ?>
                </h1>
                <form action="" method="post">
                    <div class="" style="width: 200px;">
                        <a href="<?php echo URLROOT . '/agrologist/farmers/' . $gigDetails[0]['farmerId'] . '/payments' ?>"
                            class="btn uppercase fs-4 btn-primary" id="edit_details">Payment Details</a>
                    </div>
                </form>

            </div>
            <hr>
            <!-- <?php print_r($gigDetails) ?> -->

            <div class="search pt-1">
                <input type="text" placeholder="Search by: location/ category/ title/ time period" oninput="liveSearch()"
                    id="searchbox">
                <button type="button">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <div class="[ my-2 ] [ grid ]" gap="1" md="2" lg="4">
                <?php
                if (isset($gigDetails)) {
                    foreach ($gigDetails as $gigDetail) {
                        $imageURL = UPLOADS . $gigDetail["thumbnail"];

                        
            
                        ?>
                        <div class="result__card">
                            <div class="card__img">

                                <img src="<?php echo $imageURL ?>" alt="test" />

                                <div class="location_name">

                                    <p class="ml-1">
                                        <?php echo ucwords($gigDetail['city']) ?>
                                    </p>
                                </div>
                            </div>
                            <div class="card__content">
                                <a class="text-dec-none mb-1 fs-5 text-dark fw-6"
                                    href="<?php echo URLROOT . "/agrologist/farmers/" . $gigDetail['farmerId'] . "/" . $gigDetail['gigId'] ?>">
                                    <?php echo ucwords($gigDetail['title']) ?>
                                </a>
                                <div class="mt-1 flex flex-sb-c">
                                    <p>
                                        <?php echo ucwords($gigDetail['category']) ?>
                                    </p>
                                    <p>
                                        <?php echo $gigDetail['cropCycle'] ?> days
                                    </p>
                                </div>
                            </div>
                        </div>

                        <?php
                    }
                } else {
                    require(COMPONENTS . "dashboard/noDataFound.php");
                }
                ?>
            </div>
            <?php
        }
        ?>
    </div>


    <?php require "footer.php"; ?>
    <script src="<?php echo JS ?>/app.js"></script>
    <script>

        function liveSearch() {
            let cards = document.querySelectorAll('.result__card')
            let search_query = document.getElementById("searchbox").value;
            for (var i = 0; i < cards.length; i++) {

                if (cards[i].innerText.toLowerCase()
                    .includes(search_query.toLowerCase())) {
                    cards[i].classList.remove("is-hidden");
                } else {
                    cards[i].classList.add("is-hidden");
                }
            }
        }

    </script>


</body>

</html>