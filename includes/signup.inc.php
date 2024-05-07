<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {
        require_once "../Models/Dbh.php";
        require_once "../Models/Signup.php";
        require_once "../Controllers/SignupContr.php";
        require_once "../includes/session_config.inc.php";

        error_log("~~~~~~~~~~" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        error_log("signup.inc.php: Started" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");

        $signup = new SignupContr($username, $password, $email);
        //error_log("2" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        $signup->createUser();

        if (isset($_SESSION["error_signup"])) {
            $errors = $_SESSION["error_signup"];
            unset($_SESSION["error_signup"]);
            // error_log("login.inc.php: Sending errors to front" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            header('Content-Type: application/json');
            echo json_encode($errors);

        } else {
            error_log("login.inc.php: No signup errors" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            $response = array("success" => true);
            // header('Content-Type: application/json');
            echo json_encode($response);
        }
        //error_log("3" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        //error_log("signup.inc.php: Finished" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        //header("Location: ../Views/HomepageView.php");
        die();

    } catch (Throwable $th) {
        header("Location: ../Views/Signup.php?signup=error");
        die();
    }



} else {
    error_log("signup.inc.php: Arrived via get, redirected");
    header("ocation: ../Views/Signup.php?signup=error");
    exit();
}

