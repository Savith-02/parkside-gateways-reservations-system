<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "session_config.inc.php";
    error_log("Deleting session ******** " . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");

    session_unset();
    session_destroy();
    http_response_code(200); // Set HTTP status code to 204 No Content
    exit();
    //header("Location: ../index.php");
    // try {
    //     require_once "../Models/Dbh.php";
    //     require_once "../Models/LoginModel.php";
    //     require_once "../Controllers/LoginContr.php";



    // } catch (Exception $e) {
    //     die("Error: " . $e->getMessage());
    // }
} else {
    error_log("login.inc.php: Arrived via get, redirected");
    header("Location: ../index.php?logout=error");
    exit();
}
