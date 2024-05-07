<?php
declare(strict_types=1);

class ReservationModel extends Dbh
{
    public function getSites($park)
    {
        error_log("Resercation.php: Fetching data " . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        try {
            $query = "SELECT id, site_name, site_number, type FROM campsites WHERE park = :park";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":park", $park);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (\Throwable $th) {
            error_log("Reservation.php: Fetching failed" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        }
    }
    public function getReservations($username)
    {
        error_log("Resercation.php: Fetching Reservations to view " . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        try {
            $query = "SELECT id, site_name, check_in_date, check_out_date, park, cur_date FROM reservations WHERE username = :username";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            $result = $stmt->fetchAll();
            return $result;
        } catch (\Throwable $th) {
            error_log("Reservation.php: Fetching failed" . PHP_EOL, 3, "D:/xampp/php/logs/php_error.txt");
        }
    }
    public function setReservation($username, $reservationContr)
    {
        $query = "INSERT INTO reservations (username, site_name, park, check_in_date, check_out_date) 
                           VALUES (:username, :site_name, :park, :check_in_date, :check_out_date)";
        $stmt = $this->connect()->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':site_name', $reservationContr->site);
        $stmt->bindParam(':park', $reservationContr->park);
        $stmt->bindParam(':check_in_date', $reservationContr->checkIn);
        $stmt->bindParam(':check_out_date', $reservationContr->checkOut);
        $stmt->execute();

    }
}