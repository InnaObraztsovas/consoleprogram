<?php

//namespace Core;
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $data = json_decode(file_get_contents('php://input'), true);
//    $the_file = fopen("input.json", 'wb') or die("Unable to open file!");
//    fwrite($the_file, json_encode($data, JSON_THROW_ON_ERROR));
//    fclose($the_file);
//    echo "success";
//}
require_once "src/Calculate.php";
require_once "src/InputData.php";
require_once "src/Service.php";
//require_once "src/web.php";
require_once "src/command.php";

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

$b = new OutputData();
$b->logic();
