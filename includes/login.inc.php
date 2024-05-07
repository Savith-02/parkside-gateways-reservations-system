<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    try {
        require_once "../Models/Dbh.php";
        require_once "../Models/LoginModel.php";
        require_once "../Controllers/LoginContr.php";
        require_once "../includes/session_config.inc.php";

        error_log("~~~~~~~~~~" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        error_log("login.inc.php: Started" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");

        $login = new LoginContr($username, $password);
        $login->loginUser();
        error_log("login.inc.php: here" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        if (isset($_SESSION["error_login"])) {

            $errors = $_SESSION["error_login"];
            unset($_SESSION["error_login"]);
            error_log("login.inc.php: Sending errors to front" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            header('Content-Type: application/json');
            echo json_encode($errors);
        } else {
            $_SESSION["username"] = $username;
            $response = array("success" => true);
            header('Content-Type: application/json');
            echo json_encode($response);
        }
        die();

    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    error_log("login.inc.php: Arrived via get, redirected");
    header("Location: ../Views/Login.php?login=error");
    exit();
}
