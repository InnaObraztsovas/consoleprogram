<?php

$input = $_REQUEST;
$questions = [
    'days' => "Количетво рабочих дней в месяц:",
    'price' => "Цена за урок с человека:",
    'students' => "Количество учеников в группе:",
    'lessons' => "Количество уроков в день:"
];

$validationCountDays = [
    'days'
];

foreach ($questions as $key => $question) {
    $input[$key] = readLine($question);
    validateInput($input[$key]);
    if (in_array($key, $validationCountDays)) {
        validateCountDays($input[$key]);
    }
}

function validateInput(mixed $data): void
{
    if (!empty($data) && !is_numeric($data) || $data <= 0) {
        throw new \Exception('Needle numbers');
    }
}

function validateCountDays(int $days): void
{
    if ($days > 31) {
        throw new \Exception('Max value is 31');
    }
}

$fullAmount = $input['days'] * $input['price'] * $input['price'] * $input['lessons'];


function calculatePersent(int $per, int|float $amount): int|float
{
    return $amount * $per / 100;
}

function tax(int $tax, int|float $amount): int|float
{
    return $amount - $amount * ($tax / 100);
}

for ($i = 30; $i < 80; $i += 10) {
    echo "Доход " . $i . "%: " . $grossProfit = calculatePersent($i, $fullAmount) . PHP_EOL;
    echo "Прибыль " . $i . "%: " . $netProfit = tax(5, $grossProfit) . PHP_EOL;
}


