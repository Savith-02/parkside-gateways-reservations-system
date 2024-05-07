<?php
declare(strict_types=1);

class ViewReservationContr
{
    public function getReservations($username)
    {
        $ReservationModel = new ReservationModel();
        $array = $ReservationModel->getReservations($username);
        return $array;
    }
}