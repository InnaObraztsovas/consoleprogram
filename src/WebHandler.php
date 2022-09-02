<?php

namespace Core;

class WebHandler
{
    public function __construct(private Calculate $calculate, private InputData $inputData, private View $view)
    {
    }


    public function __invoke(): void
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $result = $this->inputData->getData($data);
        $fullAmount = $this->calculate->calculateFullAmount($result);
        $output = $this->view->dataOutputJson($fullAmount);
        print_r($output);

    }
}