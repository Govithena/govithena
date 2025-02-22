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
    <link rel="stylesheet" type="text/css" href="<?php echo CSS; ?>/tech/index.css">

    <title>Dashboard | Tech Assistant</title>
    <style>
        .dashboard {
            min-height: 100dvh;
        }
    </style>
</head>

<body>

    <?php
    $active = "dashboard";
    $title = "Tech";
    require_once("navigator.php");
    ?>

    
<?php
    if(Session::has('farmer_request_accept_alert')){
        $alert = Session::pop('farmer_request_accept_alert');
        $alert->show_default_alert();
    }
    if(Session::has('farmer_request_reject_alert')){
        $alert = Session::pop('farmer_request_reject_alert');
        $alert->show_default_alert();
    }
    
    ?>

    <div class="[ container ][ dashboard ]" container-type="dashboard-section">
        <h1>Dashboard</h1>
    </div>

    <?php
    require_once("footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/chart.js"></script>
    <script src="<?php echo JS ?>/dashboard/dashboard.js"></script>
</body>

</html>