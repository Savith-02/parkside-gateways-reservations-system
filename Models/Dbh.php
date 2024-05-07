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

        $jawsdb_url = parse_url("mysql://t6eo2w0hk79fag97:vnnv87wcawx23vo7@cvktne7b4wbj4ks1.chr7pe7iynqr.eu-west-1.rds.amazonaws.com:3306/xnlhdx284fk8j3jo");
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
