<?php
declare(strict_types=1);
require_once "../Components/HeaderBar.php";
require_once "../Components/HeaderBar_Logged.php";
require_once "../Components/Navbar_Logged.php";
require_once "../Components/Navbar.php";
require_once "../Components/ButtonTypes.php";
require_once "../Components/Popup.php";
require_once "../includes/session_config.inc.php";
require_once "../Controllers/ReservationContr.php";

// if (!isset($_SESSION["reservationContr"])) {
//     error_log("resercation.php: id not Set" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
//     echo '<script>let idSet = false; </script>';
// } else {
//     // idFromServer = $_SESSION['divId'];
//     $reservationContr = unserialize($_SESSION["reservationContr"]);
//     error_log("resercation.php: idSet" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
//     echo '<script>let idFromServer = "' . $reservationContr->divId . '"; let idSet = true; </script>';
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/layout.css">
    <link rel="stylesheet" type="text/css" href="../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../public/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../public/css/popup.css">
    <link rel="stylesheet" type="text/css" href="../public/css/button.css">
    <link rel="stylesheet" type="text/css" href="../public/css/reservation.css">
    <link rel="stylesheet" type="text/css" href="../public/css/loadingScreen.css">
    <title>Reservation</title>
</head>

<body>
    <?php
    if (isset($_SESSION["username"])) {
        HeaderBar_Logged();
    } else {
        HeaderBar();
    }
    if (isset($_SESSION["username"])) {
        NavBar_Logged();
    } else {
        NavBar();
    }
    ?>
    <div id="content">
        <span id="title">Select your destination</span>
        <div id="option-holder">
            <div class="park-options">
                <div class="parkSelect" id="div1" onclick="selectDiv('div1')">
                    <label for="park1">
                        <input type="radio" class="op" name="park1" value="Yala">
                        <img src="../public/assets/park1.jpeg" alt="Yala National Park">
                        <span>Yala National Park</span>
                    </label>
                </div>
                <div class="parkSelect" id="div2" onclick="selectDiv('div2')">
                    <label for="park2">
                        <input type="radio" class="op" name="park2" value="Vilpattu">
                        <img src="../public/assets/park2.jpeg" alt="Vilpattu National Park">
                        <span>Vilpattu National Park</span>
                    </label>
                </div>
                <div class="parkSelect" id="div3" onclick="selectDiv('div3')">
                    <label for="park3">
                        <input type="radio" class="op" name="park3" value="Sinharaja">
                        <img src="../public/assets/park3.jpeg" alt="Sinharaja Forest Reserve">
                        <span>Sinharaja Forest Reserve</span>
                    </label>
                </div>
            </div>

            <div class="park-options">
                <div class="parkSelect" id="div4" onclick="selectDiv('div4')">
                    <label for="park4">
                        <input type="radio" name="park4" value="Yahangala">
                        <img src="../public/assets/park4.jpeg" alt="Yahangala">
                        <span>Yahangala</span>
                    </label>
                </div>
                <div class="parkSelect" id="div5" onclick="selectDiv('div5')">
                    <label for="park1">
                        <input type="radio" name="park5" value="Sigiriya">
                        <img src="../public/assets/park5.jpeg" alt="Sigiriya">
                        <span>Sigiriya</span>
                    </label>
                </div>
            </div>
        </div>
        <div id="loading-screen" class="hidden">
            <div id="loading-spinner"></div>
        </div>
        <div id="bottom-most">
        </div>
        <?php
        Popup();
        Button_next("Views/Reservation_2.php"); ?>
    </div>
    <script src="../public/js/loadingScreen.js"></script>
    <script src="../public/js/reservation.js"></script>
    <script src="../public/js/resFirstpopup.js"></script>
</body>

</html>