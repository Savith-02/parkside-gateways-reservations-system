<?php declare(strict_types=1);
require_once "../Components/HeaderBar.php";
require_once "../Components/Navbar.php";
require_once "../Components/Popup.php";
require_once "../includes/session_config.inc.php"; ?>

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

    <title>Login</title>
</head>

<body>
    <?php HeaderBar();
    NavBar();
    ?>
    <div id="content">
        <div class="form-container">
            <h2 id="title">Login</h2>
            <form class="block">
                <label for="login-username">Username:</label>
                <input type="text" id="login-username" name="username" autocomplete="on"
                    placeholder="Your Username"><br>

                <label for="login-password">Password:</label>
                <input type="password" id="login-password" name="password" placeholder="********"><br>

                <div id="button-holder">
                    <input type="button" class="button" value="Login" onclick="submitForm()">
                </div>
            </form>
        </div>
        <div id="loading-screen" class="hidden">
            <div id="loading-spinner"></div>
        </div>
        <?php
        // check_login_errors();
        Popup();
        ?>
    </div>
    <script src="../public/js/loadingScreen.js"></script>
    <script src="../public/js/login.js"></script>
    <script src="../public/js/formPopup.js"></script>

</body>

</html>