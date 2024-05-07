<?php
declare(strict_types=1);

class Dbh
{
    private $jawsdb_url;
    private $jawsdb_server;
    private $jawsdb_username;
    private $jawsdb_password;
    private $jawsdb_db;

    protected function connect()
    {

        $jawsdb_url = parse_url("mysql://username:password@host/database");
        $jawsdb_server = $jawsdb_url["host"];
        $jawsdb_username = $jawsdb_url["user"];
        $jawsdb_password = $jawsdb_url["pass"];
        $jawsdb_db = substr($jawsdb_url["path"], 1);

        $dsa = "mysql:host=" . $jawsdb_server . ";dbname=" . $jawsdb_db;

        try {
            $pdo = new PDO($dsa, $jawsdb_username, $jawsdb_password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Set the default fetch mode to associative array
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            // error_log("dbh.inc.php: Database connection successful" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            return $pdo;

        } catch (PDOException $e) {
            error_log("dbh.inc.php: Database connection failed" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            return null;
        }
    }
}
