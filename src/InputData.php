<?php

//namespace Core;
require_once "src/Calculate.php";
//require_once "src/InputData.php";
require_once "src/Service.php";
require_once "src/web.php";
require_once "src/command.php";

class InputData
{

    public function getData(array $data): array
    {
        $service = new Service();
//        $str = file_get_contents('http://localhost/input.json');
//        $data = json_decode($str, true);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
        }
        $input = [];
        foreach ($data as $json) {
            foreach ($json as $key => $value) {
                $input[$key] = $value;
                $service->validateInput($input[$key]);
                if (in_array($key, Service::VALIDATE_COUNT_DAYS)) {
                    $service->validateCountDays($input[$key]);
                }
            }
        }
        return $input;
    }
}