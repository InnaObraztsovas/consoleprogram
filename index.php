<?php

require_once './vendor/autoload.php';

if (php_sapi_name() == "cli") {
    (new \Core\CliHandler(
        new \Core\Calculate(),
        new \Core\Service())
    )();
} else {
    (new \Core\WebHandler(
        new \Core\Calculate(),
        new \Core\InputData()
    ))();
}

exit();

