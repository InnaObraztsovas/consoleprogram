<?php

namespace Core;

class InputData
{

    public function getData(array $data): array
    {
        $service = new Service();
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