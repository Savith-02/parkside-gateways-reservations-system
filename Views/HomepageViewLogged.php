<?php
declare(strict_types=1);
require_once "../Components/HeaderBar_Logged.php";
require_once "../Components/Navbar_Logged.php";
require_once "../Components/ButtonTypes.php";
require_once "LoginView.php";
require_once "../includes/session_config.inc.php";
if (!isLoggedIn()) {
    error_log("in HomepageLoggedIn: No username so redirect");
    header("Location: ../index.php");
    exit();
}
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
    <link rel="stylesheet" type="text/css" href="../public/css/homepagelogged.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Homepage</title>
</head>

<body>
    <?php HeaderBar_Logged();
    Navbar_Logged();
    ?>
    <div id="content">
        <div id="left-pane" class="pane">
            <div id="button-holder">
                <?php
                Button_makeReservation();
                Button_viewReservations();
                Button_viewSites();
                ?>
            </div>
        </div>
        <div id="right-pane" class="pane">
            <div id="top">
                <div id="carouselExample" class="carousel slider" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/public/assets/places/bridge.jpg" class="d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/public/assets/places/elephants.jpg" class="d-block" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/public/assets/places/sigiriya.jpg" class="d-block" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div id="bottom">
                <div class="grid-container-wrapper">
                    <img class="grid-item" src="/public/assets/places/sigiriya.jpeg" alt="Image 1">
                    <img class="grid-item" src="/public/assets/places/img.jpeg" alt="Image 2">
                    <img class="grid-item" src="/public/assets/places/images.jpeg" alt="Image 3">
                    <img class="grid-item" src="/public/assets/places/elephants.jpg" alt="Image 3">
                    <img class="grid-item" src="/public/assets/places/bridge.jpg" alt="Image 4">
                </div>
            </div>
        </div>
    </div>
    <script src="/public/js/buttonTypes.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="/public/js/corousel.js"></script>
</body>

</html>