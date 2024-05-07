<?php
declare(strict_types=1);
require_once "../Components/HeaderBar.php";
require_once "../Components/Navbar.php";
require_once "../Components/Popup.php";
require_once "../includes/session_config.inc.php";
// require_once "SignupView.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/public/css/layout.css">
    <link rel="stylesheet" type="text/css" href="/public/css/header.css">
    <link rel="stylesheet" type="text/css" href="/public/css/navbar.css">
    <link rel="stylesheet" type="text/css" href="/public/css/form.css">
    <link rel="stylesheet" type="text/css" href="/public/css/popup.css">
    <link rel="stylesheet" type="text/css" href="../public/css/loadingScreen.css">

    <title>Signup</title>
</head>

<body>
    <?php HeaderBar();
    NavBar();
    ?>
    <div id="content">
        <div class="form-container">
            <h2 id="title">Signup</h2>
            <form class="block">

                <label for="signup-username">Username:</label>
                <input type="text" id="signup-username" name="username" autocomplete="off" placeholder="Your Username">

                <label for="signup-password">Password:</label>
                <input type="password" id="signup-password" name="password" autocomplete="off" placeholder="********">

                <label for="signup-email">Email:</label>
                <input type="text" id="signup-email" name="email" value="" placeholder="example@gmail.com"
                    autocomplete="off">

                <div id="button-holder">
                    <input value="Signup" class="button" type="button" onclick="submitForm()">
                </div>
            </form>
        </div>
    </div>
    <div id="loading-screen" class="hidden">
        <div id="loading-spinner"></div>
    </div>
    <?php
    Popup();
    ?>
</body>
<script src="../public/js/loadingScreen.js"></script>
<script src="../public/js/signup.js"></script>
<script src="../public/js/formPopup.js"></script>

</html>