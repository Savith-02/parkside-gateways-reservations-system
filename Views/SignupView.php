<?php
declare(strict_types=1);
function check_signup_errors()
{
    $error_signup = "error_signup";
    error_log("check_signup_errors" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
    if (isset($_SESSION[$error_signup])) {
        $errors = $_SESSION[$error_signup];

        echo "<br>";
        foreach ($errors as $error) {
            //error_log($error);
            echo '<p class="form-error">' . $error . '</p>';
        }
        unset($_SESSION[$error_signup]);
    } else if (isset($_GET['signup']) == "success") {
        echo "<br>";
        echo '<p class="form-error">Signup success!</p>';
    }
}