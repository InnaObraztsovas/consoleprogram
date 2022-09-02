<?php

namespace Core;

class Calculate
{
    public function calculateFullAmount(array $data): int|float
    {
        return $data['days'] * $data['price'] * $data['students'] * $data['lessons'];
    }

    public function calculatePersent(int $per, int|float $amount): int|float
    {
        return $amount * $per / 100;
    }

    public function tax(int $tax, int|float $amount): int|float
    {
        return $amount - $amount * ($tax / 100);
    }

}