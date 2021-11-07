<?php
session_start();

function CallAPI($method, $url, $data = false){
    $curl = curl_init($url);
    $headers = array(
        "Accept: application/json",
        'Content-Length: ' . strlen($data)
     );

    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;

        default:
        curl_setopt($curl,CURLOPT_RETURNTRANSFER,1); 
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    }


    $resp = curl_exec($curl);
    curl_close($curl);



$data = json_decode($resp,true);
$data = array_reverse($data);
return($data);
}

?>
