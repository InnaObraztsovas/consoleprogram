<?php

require_once 'vendor/autoload.php';
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $data = json_decode(file_get_contents('php://input'), true);
//    var_dump($data);
////    $the_file = fopen("input.json", 'wb') or die("Unable to open file!");
////    fwrite($the_file, json_encode($data, JSON_THROW_ON_ERROR));
////    fclose($the_file);
////    echo "success";
//}

//


$a = new Core\CLI();
$a->logic();



