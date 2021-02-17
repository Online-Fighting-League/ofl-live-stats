<?php
    if($json = json_decode(file_get_contents("php://input"), true)) {
        print_r($json);
        $data = $json;
        //logging to file
        $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
        "Attempt: ".($result[0]['success']=='1'?'Success':'Failed').PHP_EOL.
        "Data: ".$json.PHP_EOL.
        "-------------------------".PHP_EOL;
        //Save string to log, use FILE_APPEND to append.
        file_put_contents('./log_'.date("j.n.Y").'.log', $log, FILE_APPEND);
    } else {
        print_r($_POST);
        $data = $_POST;
    }
?>
