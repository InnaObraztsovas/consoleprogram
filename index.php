<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $the_file = fopen("input.json", 'wb') or die("Unable to open file!");
    fwrite($the_file, json_encode($data, JSON_THROW_ON_ERROR));
    fclose($the_file);
    echo "success";
}

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

class InputData
{

    public function getData(array $data): array
    {
        $service = new Service();
        $str = file_get_contents('http://localhost/input.json');
        $data = json_decode($str, true);
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

class Service
{
    public const VALIDATE_COUNT_DAYS = [
        'days'
    ];

    private string $errorKey;


    public function getErrorKey(): string
    {
        return $this->errorKey;
    }

    public function setErrorKey(string $errorKey): void
    {
        $this->errorKey = $errorKey;
    }

    public function writeCommand(array $questions): array
    {
        $input = [];
        foreach ($questions as $key => $question) {
            do {
                try {
                    $error = false;
                    $input[$key] = readLine($question);
                    $this->validateInput($input[$key]);
                    if (in_array($key, self::VALIDATE_COUNT_DAYS)) {
                        $this->validateCountDays($input[$key]);
                    }
                } catch (Throwable $e) {
                    $error = true;
                    $this->setErrorKey($key);
                    readline($e->getMessage());
                }
            } while ($error);
        }

        return $input;
    }

    public function validateInput(mixed $data): void
    {
        if (!empty($data) && !is_numeric($data) || $data <= 0) {
            throw new \Exception('Needle numbers');
        }
    }


    public function validateCountDays(int $days): void
    {
        if ($days > 31) {
            throw new \Exception('Max value is 31');
        }
    }

}

class Calculate
{
    public function calculateFullAmount(array $data): int|float
    {
        return $data['days'] * $data['price'] * $data['students'] * $data['lessons'];
    }

    private function calculatePersent(int $per, int|float $amount): int|float
    {
        return $amount * $per / 100;
    }

    private function tax(int $tax, int|float $amount): int|float
    {
        return $amount - $amount * ($tax / 100);
    }

    public function dataOutput(int|float $fullAmount): void
    {
        for ($i = 30; $i < 80; $i += 10) {
            echo "Доход " . $i . "%: " . $grossProfit = $this->calculatePersent($i, $fullAmount) . PHP_EOL;
            echo "Прибыль " . $i . "%: " . $this->tax(5, $grossProfit) . PHP_EOL;
        }
    }

    public function dataOutputJson($fullAmount): mixed
    {
        $result = [];
        for ($i = 30; $i < 80; $i += 10) {
            $result[$i] = [
                "Доход " . $i . "%: " => $grossProfit = $this->calculatePersent($i, $fullAmount) . PHP_EOL,
                "Прибыль " . $i . "%: " => $this->tax(5, $grossProfit) . PHP_EOL
            ];
        }
        return json_encode($result);
    }
}

//$a = new CLI();
//$a->logic();

$b = new OutputData();
$b->logic();