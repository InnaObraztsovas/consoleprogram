<?php

namespace Core;

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
                    $input[$key] = readline($question);
                    $this->validateInput($input[$key]);
                    if (in_array($key, self::VALIDATE_COUNT_DAYS)) {
                        $this->validateCountDays($input[$key]);
                    }
                } catch (Throwable $e) {
                    $error = true;
                    $this->setErrorKey($key);
                    \readline($e->getMessage());
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
