<?php 
    require 'path.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Tracker</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Open+Sans&display=swap" rel="stylesheet">
</head>
<body>
    <div class="parent">
        <div class="app-header">
            <div class="weather">

            </div>
            <div class="logo"><a href="index.php"> <img src="images/calendar.png" alt="Logo Icon"> <span>Task Tracker</span> </a> </div>
            <div class="menus"><a class="home-menu" href="<?php echo BASE_URL; ?>/login.php">Get Started</a></div>
        </div>
        <div class="app-content">
            <div>
                <div class="time"></div>
                <div class="date"></div>
                <div class="greet"></div>
                <div class="crypto"></div>
                <div class="button"> <a href="<?php echo BASE_URL; ?>/login.php">Get Started</a> </div>
            </div>
        </div>
    </div>

    <script src="js/app.js"></script>
</body>
</html>