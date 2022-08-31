<?php

namespace Core;

class Calculate
{
    public function calculateFullAmount(array $data): int|float
    {
        return $data['days'] * $data['price'] * $data['students'] * $data['lessons'];
    }

    private function calculatePersent(int $per, int|float $amount): int|float
    {
        return $amount * $per / 100;
    }

    private function tax(int $tax, int|float $amount): int|float
    {
        return $amount - $amount * ($tax / 100);
    }

    public function dataOutput(int|float $fullAmount): void
    {
        for ($i = 30; $i < 80; $i += 10) {
            echo "Доход " . $i . "%: " . $grossProfit = $this->calculatePersent($i, $fullAmount) . PHP_EOL;
            echo "Прибыль " . $i . "%: " . $this->tax(5, $grossProfit) . PHP_EOL;
        }
    }

    public function dataOutputJson($fullAmount): mixed
    {
        $result = [];
        for ($i = 30; $i < 80; $i += 10) {
            $result[$i] = [
                "Доход " . $i . "%: " => $grossProfit = $this->calculatePersent($i, $fullAmount) . PHP_EOL,
                "Прибыль " . $i . "%: " => $this->tax(5, $grossProfit) . PHP_EOL
            ];
        }
//        return json_encode($result);
        return $result;
    }
}