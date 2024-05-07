<?php
declare(strict_types=1);
function check_login_errors()
{
    $error_login = "error_login";
    error_log("check_login_errors" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
    if (isset($_SESSION[$error_login])) {
        $errors = $_SESSION[$error_login];

        echo "<br>";
        foreach ($errors as $error) {
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION[$error_login]);
    } else if (isset($_GET['login']) == "success") {
        echo "<br>";
        echo '<p class="form-error">login success!</p>';
    }
}
function isLoggedIn()
{
    // if (isset($_SESSION["username"])) {
    //     error_log("username: " . $_SESSION["username"] . "");
    // } else {
    //     error_log("No username");
    // }
    return isset($_SESSION['username']);
}