<?php

namespace Core;

class WebHandler
{
    public function __construct(private Calculate $calculate, private InputData $inputData)
    {
        $this->setCalculate($calculate);
        $this->setInputData($inputData);
    }

    public function getCalculate(): Calculate
    {
        return $this->calculate;
    }

    public function setCalculate(Calculate $calculate): void
    {
        $this->calculate = $calculate;
    }


    public function getInputData(): InputData
    {
        return $this->inputData;
    }


    public function setInputData(InputData $inputData): void
    {
        $this->inputData = $inputData;
    }


    public function __invoke(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->inputData->getData($data);
        $fullAmount = $this->calculate->calculateFullAmount($result);
        $output = $this->calculate->dataOutputJson($fullAmount);
        print_r($output);

    }
}