<?php
declare(strict_types=1);

class LoginModel extends Dbh
{
    public function getUser($username)
    {
        //error_log("9" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        $query = "SELECT username FROM users WHERE username = :username;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function checkPassword($username, $password): bool
    {
        $options = ['cost' => 5];
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
        $storedHashedPassword = $this->getHashedPassword($username);
        //error_log("LoginModel:" . $hashedPassword . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        //error_log("LoginModel:" . $storedHashedPassword . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        return password_verify($password, $storedHashedPassword);
    }
    private function getHashedPassword($username): string
    {
        $query = "SELECT password FROM users WHERE username = :username;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC)["password"];
        return $result;
    }
}