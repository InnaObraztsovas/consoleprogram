<?php

require_once "src/Calculate.php";
require_once "src/InputData.php";
require_once "src/Service.php";
require_once "src/web.php";
require_once "src/command.php";

if(php_sapi_name() == "cli"){
    require_once "./src/command.php";
}else {
    require_once "./src/web.php";
}

exit();



