<?php

namespace App\Repositories\Interfaces;

interface IBinanceRepository
{
    public function getPrice();
    public function savePrice($data);
}