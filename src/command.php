<?php

//namespace Core;
require_once "src/Calculate.php";
require_once "src/InputData.php";
require_once "src/Service.php";
require_once "src/web.php";
//require_once "src/command.php";
class CLI
{
    public const QUESTIONS = [
        'days' => "Количетво рабочих дней в месяц:",
        'price' => "Цена за урок с человека:",
        'students' => "Количество учеников в группе:",
        'lessons' => "Количество уроков в день:"
    ];

    public function logic(): void
    {
        $service = new Service();
        $calculate = new Calculate();
        $result = $service->writeCommand(self::QUESTIONS);
        $fullAmount = $calculate->calculateFullAmount($result);
        $calculate->dataOutput($fullAmount);
    }
}


$a = new CLI();
$a->logic();