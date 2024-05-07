<?php

ini_set("session.use_only _cookies", 1);
ini_set("session.use_strict_mode", 1);



session_start();
// error_log("session_config.inc.php: Session made" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");

// if (!isset($_SESSION["last_regeneration"])) {
//     session_regenerate_id(true);
//     $_SESSION['last_regeneration'] = time();
// } else {
//     $interval = 60 * 30;

//     if (time() - $_SESSION['last_regeneration'] >= $interval) {
//         session_regenerate_id(true);
//         $_SESSION['last_regeneration'] = time();
//     }
// }