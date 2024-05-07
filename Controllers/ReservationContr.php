<?php
declare(strict_types=1);

class ReservationContr
{
    // public $park; //park
    // public $site; //park
    // public $divId;
    // public $checkIn;
    // public $checkOut;
    // public function __construct(string $park)
    // {
    //     $this->park = $park;
    // }
    public function getSites(string $park)
    {
        $ReservationModel = new ReservationModel();
        $array = $ReservationModel->getSites($park);
        return $array;
    }

    public function setReservation(string $username, object $reservation)
    {
        $ReservationModel = new ReservationModel();
        $ReservationModel->setReservation($username, $reservation);
    }
}
