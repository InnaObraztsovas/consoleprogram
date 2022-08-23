<?php

while(true) {

    $firstCmd = readLine("Количетво рабочих дней в месяц:");
    if (!empty($firstCmd && is_int($firstCmd))) {
        readline_add_history($firstCmd);
    }

    $secondCmd = readLine("Цена за урок с человека:");
    if (!empty($secondCmd && is_int($secondCmd))) {
        readline_add_history($secondCmd);
    }

    $thirdCmd = readLine("Количество учеников в группе:");
    if (!empty($thirdCmd && is_int($thirdCmd))) {
        readline_add_history($thirdCmd);
    }

    $fourthCmd = readLine("Количество уроков в день:");
    if (!empty($fourthCmd && is_int($fourthCmd))) {
        readline_add_history($fourthCmd);
    }


    $fullAmount = $firstCmd * $secondCmd * $thirdCmd * $fourthCmd;
    $halfAmount = ($firstCmd * $secondCmd * $thirdCmd * $fourthCmd) / 2;
    $trtPrsntAmount = ($firstCmd * $secondCmd * $thirdCmd * $fourthCmd) * 30 / 100;

    echo "Выручка 100%:" . $fullAmount . PHP_EOL;
    echo "Выручка 50%:" . $halfAmount . PHP_EOL;
    echo "Выручка 30%:" . $trtPrsntAmount . PHP_EOL;
}
