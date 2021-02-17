<?php
    if($json = json_decode(file_get_contents("php://input"), true)) {
        print_r($json);
        $data = $json;
    } else {
        print_r($_POST);
        $data = $_POST;
    }
    $fWrite = fopen("log.txt","a");
    $wrote = fwrite($fWrite, var_dump($data));
    fclose($fWrite);
?> 
