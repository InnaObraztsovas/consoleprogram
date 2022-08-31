<?php

namespace Core;

class OutputData
{

    public function logic(): void
    {
        $inputData = new InputData();
        $calculate = new Calculate();
        $result = $inputData->getData(CLI::QUESTIONS);
        $fullAmount = $calculate->calculateFullAmount($result);
        $output = $calculate->dataOutputJson($fullAmount);
        print_r($output);
    }
}
