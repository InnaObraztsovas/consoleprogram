<?php

namespace Core;

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