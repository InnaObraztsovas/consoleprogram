<?php


$days = readLine("Количетво рабочих дней в месяц:");
$price = readLine("Цена за урок с человека:");
$students = readLine("Количество учеников в группе:");
$lessons = readLine("Количество уроков в день:");

$fullAmount = $days * $price * $students * $lessons;

function calculatePersent(int $per, int|float $amount): int|float
{
    return $amount*$per / 100;
}

function tax(int $tax, int|float $amount): int|float
{
    return $amount - $amount*($tax/100);
}

for ($i=30;$i<80;$i+=10){
    echo "Доход " .$i . "%: " . $grossProfit = calculatePersent($i, $fullAmount) .PHP_EOL;
    echo "Прибыль " .$i . "%: " . $netProfit = tax(5, $grossProfit) .PHP_EOL;
}


