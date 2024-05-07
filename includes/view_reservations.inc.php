<?php

$method = $_SERVER["REQUEST_METHOD"];

if ($method == "GET") {
    // $option = $_POST["option"];

    require_once "./session_config.inc.php";
    require_once "../Models/Dbh.php";
    require_once "../Models/Reservation.php";
    require_once "../Controllers/ViewReservations.Contr.php";

    try {
        error_log("view_resercations.inc.php" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        // if (isset($_SESSION["reservationContr"])) {
        //     $reservationContr = unserialize($_SESSION["reservationContr"]);
        //     if (isset($reservationContr->divId) && $reservationContr->divId == $divId) {
        //         $response = array("success" => true);
        //         echo json_encode($response);
        //         die();
        //     }
        // }
        if (isset($_SESSION["username"])) {
            error_log("all set" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            error_log("username: " . $_SESSION["username"] . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");

            // $reservationContr = unserialize($_SESSION["reservationContr"]);
            $reservationContr = new ViewReservationContr();
            $array = $reservationContr->getReservations($_SESSION["username"]);
            echo json_encode($array);

        }
    } catch (Exception $e) {
        error_log("Reservation.inc.php: GET failed" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
    }

}