<?php declare(strict_types=1);
require_once "../Components/HeaderBar_Logged.php";
require_once "../Components/Navbar_Logged.php";
require_once "../Components/HeaderBar.php";
require_once "../Components/Navbar.php";
require_once "../includes/session_config.inc.php";
require_once "../Components/Popup.php";

?>
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
    <link rel="stylesheet" type="text/css" href="../public/css/pending.css">
    <!-- <link rel="stylesheet" type="text/css" href="../public/css/bookingForm.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pending</title>
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
        <div class="alert alert-warning alert-dismissible fade show" id="FormAlert" role="alert">
            <span>Page under development!</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" id="alertButton"
                aria-label="Close"></button>
        </div>
    </div>
    <!-- <script src="/public/js/buttonTypes.js"></script> -->
    <?php
    Popup();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <!-- <script src="../public/js/bookingForm.js"></script> -->
</body>

</html>