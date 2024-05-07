<?php
$method = $_SERVER["REQUEST_METHOD"];

require_once "./session_config.inc.php";
require_once "../Controllers/ReservationContr.php";

if ($method == "POST") {
    $option = $_POST["option"];
    // error_log("resercation.inc.php: Got request" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
    require_once "../Models/Dbh.php";
    require_once "../Models/Reservation.php";

    try {
        if ($option == "getSites") {
            $park = $_POST["park"];
            $reservationContr = new ReservationContr();
            $array = $reservationContr->getSites($park);
            echo json_encode($array);
        }

        if ($option == "bookingForm") {
            try {
                $username = $_SESSION["username"];
                $reservationContrObject = json_decode($_POST["reservationContr"]);
                $reservationContr = new reservationContr();
                $reservationContr->setReservation($username, $reservationContrObject);
                echo json_encode(array("success" => true));

            } catch (\Throwable $th) {
                //throw $th;
            }
        } else {
            error_log("resercation.inc.php: page  ? " . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        }
        die();
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
} else {
    header("Location: /index.php?redirection=reservation");
    exit();
}


// elseif ($option == "leave") {

//     error_log("resercation.inc.php: Deleating session - ResController ********** " . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
//     unset($_SESSION["reservationContr"]);
//     $response = array("success" => true);
//     echo json_encode($response);
// } 
// elseif ($method == "GET") {
// foreach ($_GET as $key => $value) {
//     error_log("Key: " . $key . ", Value: " . $value . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
// }
// try {
//     require_once "./session_config.inc.php";
//     require_once "../Models/Dbh.php";
//     require_once "../Models/Reservation.php";
//     require_once "../Controllers/ReservationContr.php";
//     error_log("reservation.inc.php: page2 GET " . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
//     $reservationContr = unserialize($_SESSION["reservationContr"]);
//     // $array = $reservationContr->getSites($park);
//     $array = $reservationContr->getSites();
//     echo json_encode($array);

// } catch (Exception $e) {
//     error_log("Reservation.inc.php: GET failed" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
// }

// $reservationContr = new ReservationContr($park);
//$park = $_SESSION["park"];
// } 

// if ($option == "page1") {
//     error_log("resercation.inc.php: page1" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
//     $park = $_POST["park"];
//     $divId = $_POST["divId"];
//     if (isset($_SESSION["reservationContr"])) {
//         $reservationContr = unserialize($_SESSION["reservationContr"]);
//         if (isset($reservationContr->divId) && $reservationContr->divId == $divId) {
//             $response = array("success" => true);
//             echo json_encode($response);
//             die();
//         }
//     }
//     $reservationContr = new ReservationContr($park);
//     $reservationContr->divId = $divId;
//     $_SESSION["reservationContr"] = serialize($reservationContr);
//     $response = array("success" => true);
//     echo json_encode($response);

// } 