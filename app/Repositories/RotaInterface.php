<?php

namespace App\Repositories;

interface RotaInterface {
    public function getShifts();

    public function getDaysOff();

    public function getActive();

    public function getDays();
}