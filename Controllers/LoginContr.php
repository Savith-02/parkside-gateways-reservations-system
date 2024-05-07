<?php
declare(strict_types=1);

class LoginContr
{
    private $username;
    private $password;
    private $errors = [];

    public function __construct(string $username, string $password)
    {
        error_log("LoginContr.php: Controller Created" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        $this->username = $username;
        $this->password = $password;
    }

    public function loginUser(): void
    {
        $LoginModel = new LoginModel();
        require_once "../includes/session_config.inc.php";
        if ($this->input_not_empty() && $this->username_avaiable($LoginModel) && $this->password_correct($LoginModel)) {
            error_log("LoginContr.php: No error" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            $_SESSION["username"] = htmlspecialchars($this->username);

            try {
                $url = "https://gender-api.com/v2/gender";
                $data = json_encode([
                    'first_name' => $this->username, // JSON payload to send
                ]);
                $headers = [
                    'Content-Type: application/json',
                    'Authorization: Bearer 9bd4cd0e6cf6ec26e223d8070e17383e8f50539a8255cbc17b53e2de9f362c6c'
                ];
                //error_log("LoginContr.php: token: " . getenv('GENDER-API-KEY') . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
                $ch = curl_init(); // Initialize cURL session
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true); // Set request method to POST
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // Set the POST data
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // Set the headers
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string

                $response = curl_exec($ch);
                curl_close($ch);
                $responseArray = json_decode($response, true);

                // error_log("error array empty" . $responseArray["result_found"] . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
                // if (empty($responseArray)) {
                // } else {
                //     foreach ($responseArray as $key => $value) {
                //         error_log("error: " . $key . "-" . " ," . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
                //     }
                // }

                if (!isset($responseArray["gender"]) || $responseArray["gender"] === "unknown") {
                    $responseArray["gender"] = "male";
                } else {
                    $_SESSION["gender"] = $responseArray["gender"];
                }
            } catch (\Throwable $th) {
                error_log("LoginContr.php: Error in Curl session" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            }
        } else {
            error_log("loginContr.php: Some error" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");

            // if (empty($this->errors)) {
            //     error_log("error array empty" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            // } else {
            //     foreach ($this->errors as $key => $value) {
            //         error_log("error: " . $key . "-" . $value . " ," . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            //     }
            // }

            $_SESSION["error_login"] = $this->errors;
            // header("Location: /Views/Login.php?login=error");
        }
        //$_SESSION["user_id"] = $result["id"];
        // header("Location: /Views/HomepageViewLogged.php");
        // die();
    }
    private function input_not_empty()
    {
        if (empty($this->username) || empty($this->password)) {
            error_log("loginContr.php: Input Empty" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            $this->errors["empty_input"] = "Fill in all fields!";
            return false;
        } else {
            return true;
        }
    }
    private function username_avaiable(LoginModel &$loginModel)
    {
        $result = $loginModel->getUser($this->username);
        if ($result === 0) {
            error_log("loginContr.php: Username not present" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            $this->errors["username_invalid"] = "Invalid  username!";
            return false;
        } else {
            error_log("loginContr.php: Username present" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
            return true;
        }
    }
    private function password_correct(LoginModel &$loginModel)
    {
        $result = $loginModel->checkPassword($this->username, $this->password);
        if ($result == 0) {
            $this->errors["password_incorrect"] = "Incorrect password!";
            return false;
        } else {
            return true;
        }

    }
}
