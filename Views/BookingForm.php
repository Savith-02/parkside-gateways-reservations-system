<?php declare(strict_types=1);
require_once "../Components/HeaderBar_Logged.php";
require_once "../Components/Navbar_Logged.php";
require_once "../Components/HeaderBar.php";
require_once "../Components/Navbar.php";
require_once "../Components/ButtonTypes.php";
require_once "../includes/session_config.inc.php";
require_once "../Components/Popup.php";
require_once "../Controllers/ReservationContr.php";
// if (!isLoggedIn()) {
// error_log("No username so redirect"); 
// header("Location: ../index.php"); 
// exit(); 
// } 
// if (!isset($_SESSION["reservationContr"])) {
//     error_log("Reservation_2.php: Reservation_Controller not set" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
//     header("Location: ../index.php");
//     exit();
// } else {
//     $reservationContr = unserialize($_SESSION["reservationContr"]);
// }
$loggedIn = isset($_SESSION['username']); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../public/css/layout.css">
    <link rel="stylesheet" type="text/css" href="../public/css/header.css">
    <link rel="stylesheet" type="text/css" href="../public/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="../public/css/button.css">
    <link rel="stylesheet" type="text/css" href="../public/css/popup.css">
    <link rel="stylesheet" type="text/css" href="../public/css/bookingForm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Booking Form</title>
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
        <?php if (!isset($_SESSION["username"])): ?>
            <div class="alert alert-primary alert-dismissible fade show" id="bookingFormAlert" role="alert">
                To make a reservation you have to be logged in!
                <button type="button" class="btn-close" data-bs-dismiss="alert" id="alertButton"
                    aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <section id="sec-1" class="block">
            <div class="sec-title">
                <span id="title-top">Booking Information</span>
            </div>
            <div id="sec-1-content">
                <div>
                    <span id="park"></span><br>
                    <span id="site"></span><br>
                    <span id="checkIn"></span><br>
                    <span id="checkOut"></span><br>
                </div>
                <div id="button_strip">
                    <button id="cancel" class="button form" onclick="cancel('')">Cancel</button>
                    <button id="submit" class="button form" onclick="submit('Views/ViewReservations.php')"
                        disabled>Submit</button>
                </div>

            </div>
        </section>
    </div>
    <div id="loading-screen" class="hidden">
        <div id="loading-spinner"></div>
    </div>
    <script src="../public/js/loadingScreen.js"></script>
    <!-- <script src="/public/js/buttonTypes.js"></script> -->

    <?php
    Popup();
    Button_previous("Views/Reservation_2.php");
    ?>

    <script>
        <?php if ($loggedIn): ?>
            let button = document.getElementById('submit');
            button.removeAttribute('disabled');
        <?php endif; ?>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="../public/js/bookingForm.js"></script>
</body>

</html>