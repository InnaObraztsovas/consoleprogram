<?php


$firstCmd = readLine("Количетво рабочих дней в месяц:");
$secondCmd = readLine("Цена за урок с человека:");
$thirdCmd = readLine("Количество учеников в группе:");
$fourthCmd = readLine("Количество уроков в день:");

$fullAmount = $firstCmd * $secondCmd * $thirdCmd * $fourthCmd;

function calculatePersent($per, $amount)
{
    return $amount*$per / 100;
}

function tax($tax,$amount)
{
    return $amount - $amount*($tax/100);
}
$hundred = calculatePersent(100,$fullAmount);
$thirty = calculatePersent(30,$fullAmount);
$forty = calculatePersent(40,$fullAmount);
$fifty = calculatePersent(50,$fullAmount);
$sixty = calculatePersent(60,$fullAmount);
$seventy = calculatePersent(70,$fullAmount);

$m = tax(5,$hundred);
$f = tax(5,$fifty);
$z = tax(5,$thirty);


echo "Доход 100%:" . $hundred . PHP_EOL;
echo "Прибыль 100%" .$m . PHP_EOL;
echo "Доход 50%:" . $fifty . PHP_EOL;
echo "Прибыль 50%" .$f . PHP_EOL;
echo "Доход 30%:" . $thirty . PHP_EOL;
echo "Прибыль 30%:" . $z . PHP_EOL;

