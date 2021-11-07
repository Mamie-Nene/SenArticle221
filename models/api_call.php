<?php
session_start();

function CallAPI($method, $url, $data = false){
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
$headers = array(
    "Accept: application/json",
 );
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
$resp = curl_exec($curl);
curl_close($curl);

$data = json_decode($resp,true);
$data = array_reverse($data);
$data = array_chunk($data,5);
return($data);
}

?>
