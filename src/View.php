<?php

namespace Core;

class View
{

    public function __construct(private Calculate $calculate)
    {
    }

    public function dataOutput(int|float $fullAmount): void
    {
        for ($i = 30; $i < 80; $i += 10) {
            echo "Доход " . $i . "%: " . $grossProfit = $this->calculate->calculatePersent($i, $fullAmount) . PHP_EOL;
            echo "Прибыль " . $i . "%: " . $this->calculate->tax(5, $grossProfit) . PHP_EOL;
        }
    }

    public function dataOutputJson($fullAmount): mixed
    {
        $result = [];
        for ($i = 30; $i < 80; $i += 10) {
            $result[$i] = [
                "Доход " . $i . "%: " => $grossProfit = $this->calculate->calculatePersent($i, $fullAmount) . PHP_EOL,
                "Прибыль " . $i . "%: " => $this->calculate->tax(5, $grossProfit) . PHP_EOL
            ];
        }
        return $result;
    }
}