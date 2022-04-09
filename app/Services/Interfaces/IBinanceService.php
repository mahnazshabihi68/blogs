<?php

namespace App\Services\Interfaces;

interface IBinanceService
{
    public function getPrice();
    public function save($data);
}