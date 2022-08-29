<?php

interface Command{

    public const QUESTIONS = [
        'days' => "Количетво рабочих дней в месяц:",
        'price' => "Цена за урок с человека:",
        'students' => "Количество учеников в группе:",
        'lessons' => "Количество уроков в день:"
    ];

    public function logic();

}
class CLI implements Command
{

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
    private const VALIDATE_COUNT_DAYS = [
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

    private function validateInput(mixed $data): void
    {
        if (!empty($data) && !is_numeric($data) || $data <= 0) {
            throw new \Exception('Needle numbers');
        }
    }


    private function validateCountDays(int $days): void
    {
        if ($days > 31) {
            throw new \Exception('Max value is 31');
        }
        $catch = true;
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
            echo "Доход " . $i . "%: " . $grossProfit = $this->calculatePersent($i, $fullAmount) . PHP_EOL;;
            echo "Прибыль " . $i . "%: " . $this->tax(5, $grossProfit) . PHP_EOL;;
        }
    }

}

$a = new CLI();
$a->logic();
