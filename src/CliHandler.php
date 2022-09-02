<?php

namespace Core;

class CliHandler
{
    public const QUESTIONS = [
        'days' => "Количетво рабочих дней в месяц:",
        'price' => "Цена за урок с человека:",
        'students' => "Количество учеников в группе:",
        'lessons' => "Количество уроков в день:"
    ];

    public function __construct(private Calculate $calculate, private Service $service, private View $view)
    {
    }


    public function __invoke(): void
    {
        $result = $this->service->writeCommand(self::QUESTIONS);
        $fullAmount = $this->calculate->calculateFullAmount($result);
        $this->view->dataOutput($fullAmount);
    }
}