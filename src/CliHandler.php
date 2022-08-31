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

    public function __construct(private Calculate $calculate, private Service $service)
    {
        $this->setService($service);
        $this->setCalculate($calculate);
    }

    public function getCalculate(): Calculate
    {
        return $this->calculate;
    }

    public function setCalculate(Calculate $calculate): void
    {
        $this->calculate = $calculate;
    }

    public function getService(): Service
    {
        return $this->service;
    }

    public function setService(Service $service): void
    {
        $this->service = $service;
    }


    public function __invoke(): void
    {
        $result = $this->service->writeCommand(self::QUESTIONS);
        $fullAmount = $this->calculate->calculateFullAmount($result);
        $this->calculate->dataOutput($fullAmount);
    }
}