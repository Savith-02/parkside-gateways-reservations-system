<?php
declare(strict_types=1);

class Signup extends Dbh
{
    public function setUser($username, $password, $email)
    {
        try {
            error_log("signupContrphp: Creating User" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            $query = "INSERT INTO users(username, password, email) VALUES (:username, :password, :email);";
            $stmt = $this->connect()->prepare($query);

            $options = ['cost' => 5];
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $hashedPassword);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
        } catch (Throwable $th) {
            error_log("signup: Creating user failed" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        }

    }
    public function getUser($username)
    {
        //error_log("9" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        $query = "SELECT username FROM users WHERE username = :username;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function getEmail($email)
    {
        //error_log("10" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        $query = "SELECT username FROM users WHERE email = :email;";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->rowCount();
    }

}
