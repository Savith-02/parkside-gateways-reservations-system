<?php
declare(strict_types=1);

class SignupContr
{
    private $username;
    private $password;
    private $email;
    private $errors = [];

    public function __construct(string $username, string $password, string $email)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }
    public function createUser(): void
    {
        $signupModel = new Signup();
        $this->input_not_empty();
        $this->email_valid();
        $this->username_not_taken($signupModel);
        $this->email_not_registered($signupModel);
        //error_log("8" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");

        require_once "../includes/session_config.inc.php";
        if ($this->errors) {
            error_log("signupContr.php: Some error" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");

            $_SESSION["error_signup"] = $this->errors;
            // header("Location: /Views/Signup.php?signup=error");
            // die();
        } else {
            error_log("signupContr.php: No error" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            //$signupModel = new Signup();
            $signupModel->setUser($this->username, $this->password, $this->email);
            // header("Location: ../Views/Login.php");
            // die();
        }
    }
    private function email_valid()
    {
        $result = filter_var($this->email, FILTER_VALIDATE_EMAIL);
        if ($result) {
            return true;
        } else {
            error_log("signupContr.php: Invalid email" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            $this->errors["invalid_email"] = "Invalid email used!";
            return true;
        }
    }
    private function input_not_empty()
    {

        if (empty($this->email) || empty($this->username) || empty($this->password)) {
            error_log("signupContr.php: Input Empty" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            $this->errors["empty_input"] = "Fill in all fields!";
            return false;
        } else {
            return true;
        }
    }
    private function username_not_taken(Signup &$signupModel)
    {
        //$signupModel = new Signup();
        $result = $signupModel->getUser($this->username);
        if ($result === 0) {
            //error_log("5 back continued" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            error_log("signupContr.php: Username Avaiable" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            return true;
        } else {
            error_log("signupContr.php: Username taken" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            $this->errors["username_taken"] = "Username already taken!";
            return false;
        }
    }
    private function email_not_registered(Signup &$signupModel)
    {
        //$signupModel = new Signup();
        if ($signupModel->getEmail($this->email) == 0) {
            error_log("signupContr.php: Email Avaiable" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            return true;
        } else {
            error_log("signupContr.php: Email taken" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            $this->errors["email_used"] = "Email already registered!";
            return false;
        }
    }
}