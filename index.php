<?php
$url = "https://mh-phptest.heroku.com/phptest"; 
$data = array(
    'userID'      => 'a7664093-502e-4d2b-bf30-25a2b26d6021',
    'itemKind'    => 0,
    'value'       => 1,
    'description' => 'Ahoj.',
    'itemID'      => '03e76d0a-8bab-11e0-8250-000c29b481aa'
);
$content = json_encode($data);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER,
        array("Content-type: application/json"));
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $content['description']);

$json_response = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ( $status != 201 ) {
    die("Error: call to URL $url failed with status $status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}


curl_close($curl);

$response = json_decode($json_response, true);
?>