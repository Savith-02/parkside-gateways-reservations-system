<?php declare(strict_types=1);
require_once "../Components/HeaderBar.php";
require_once "../Components/HeaderBar_Logged.php";
require_once "../Components/Navbar_Logged.php";
require_once "../Components/Navbar.php";
require_once "../Components/ButtonTypes.php";
require_once "../Components/Popup.php";
require_once "../includes/session_config.inc.php";

// require_once "../Models/Dbh.php";
// require_once "../Models/Reservation.php";
require_once "../Controllers/ReservationContr.php";

// if (!isset($_SESSION["reservationContr"])) {
//     error_log("Reservation_2.php: Reservation_Controller not set" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
//     // echo '<script>let checkIn = ' . false . '; let checkOut = ' . false . '; </script>';
//     header("Location: ../index.php");
//     exit();
// } else {
//     $reservationContr = unserialize($_SESSION["reservationContr"]);
//     if (isset($reservationContr->checkIn)) {
//         echo '<script>let site_name = ' . json_encode($reservationContr->site) . ';</script>';
//         echo '<script>let checkIn = ' . json_encode($reservationContr->checkIn) . '; let checkOut = ' . json_encode($reservationContr->checkOut) . ';</script>';
//     } else {
//         echo '<script>let checkIn = false; let checkOut = false;</script>';
//     }
// }
// if() {
//     error_log("ViewReservation.php: Reservation_Controller set" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
//     echo '<script>let checkIn = ' . json_encode($reservationContr->checkIn) . '; let checkOut = ' . json_encode($reservationContr->checkOut) . ';</script>';
//}
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
    <link rel="stylesheet" type="text/css" href="../public/css/reservation_2.css">
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
    <div id="loading-screen" class="hidden">
        <div id="loading-spinner"></div>
    </div>
    <script src="../public/js/loadingScreen.js"></script>

    <div id="content">
        <div id="container">
            <section id="sec-1" class="block">
                <div class="sec-title">
                    <span id="title-top">Select your Destination</span>
                </div>
                <div id="sec-1-content">
                    <div id="left-pane">
                        <div class="sub-sec-title">Select Accomodaton type</div>
                        <div id="type-box">
                            <label>
                                <input class="checkbox" type="checkbox" name="accommodation" value="bungalow" checked
                                    onchange="filterData()">
                                Bungalow
                            </label>
                            <label>
                                <input class="checkbox" type="checkbox" name="accommodation" value="campsite" checked
                                    onchange="filterData()">
                                Campsite
                            </label>

                        </div>
                    </div>
                    <div id="right-pane" class="label2">
                        <select id="select-options" name="site_name" title="Select preferred bungalow/campsite">
                        </select>
                    </div>

                </div>
            </section>
            <section id="sec-2" class="block">
                <div class="sec-title">
                    <span id="title-bottom">Select Duration</span>
                </div>
                <div id="dates">
                    <label for="check-in-date">Check-in Date:
                        <input type="date" id="check-in-date" name="check-in-date">
                    </label>
                    <label for="check-out-date" class="label2">Check-out Date:
                        <input type="date" id="check-out-date" name="check-out-date">
                    </label>
                </div>
            </section>
        </div>
    </div>

    <?php
    Popup();
    Button_previous("Views/Reservation.php");
    Button_next("Views/BookingForm.php"); ?>
    <script src="../public/js/loadingScreen.js"></script>
    <script src="../public/js/reservationPage2.js"></script>
    <script src="../public/js/formPopup.js"></script>
</body>

</html>