<?php

    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://panca.informaticapp.com/TipoProducto/'.$_GET['tipr_id'],
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'DELETE',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Basic YTJhYTA3YWRmaGRmcmV4ZmhnZGZoZGZlcnR0Z2VBR04xOEVqRXdCOC5kenFDZFg1NW5OU3U2NTU5LkFHOm8yYW8wN29kZmhkZnJleGZoZ2RmaGRmZXJ0dGdlcTNvN3M5Ly84Lmh6T3FneWdVcjZGcVdSN1hiYzNyQw=='
      ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
    $data = json_decode($response, true);
    header("Location: tipo_producto_html.php");

?>