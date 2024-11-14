<?php
$config = include('config.php');
$username = $config['username'];
$password = $config['password'];
$connectionString = $config['connect_string'];
$bearerToken = $config['token'];

$inventory_array = array(
    array(
        "company_code" => "TNS",
        "branch_code" => "SG",
        "whse_code" => "SNK",
        "cust_code" => "LEN-E",
        "plant" => "SG51"
    ),
    array(
        "company_code" => "TNS",
        "branch_code" => "SG",
        "whse_code" => "BULIM",
        "cust_code" => "LEN-E",
        "plant" => "SG51"
    ),
    array(
        "company_code" => "TNS",
        "branch_code" => "SG",
        "whse_code" => "SNK",
        "cust_code" => "LEN",
        "plant" => "SG51"
    ),
    array(
        "company_code" => "TNLS",
        "branch_code" => "SA",
        "whse_code" => "WHI",
        "cust_code" => "LEN",
        "plant" => "MY51"
    ),
    array(
        "company_code" => "TNLS",
        "branch_code" => "SA",
        "whse_code" => "WHI",
        "cust_code" => "LEN-DC",
        "plant" => "MY51"
    ),
    array(
        "company_code" => "TT",
        "branch_code" => "BK",
        "whse_code" => "A",
        "cust_code" => "LEN",
        "plant" => "TH51"
    )
);

$url = "https://wmsjbapi.tiongnam.com:8443/api-platform/public/jbwmsapi/lenovo/v1/inventory";

foreach ($inventory_array as $item) {
    $jsonData = json_encode($item);
    $curl = curl_init($url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Authorization: Bearer ' . $bearerToken,
        'Content-Length: ' . strlen($jsonData)
    ));

    $response = curl_exec($curl);

    if (!curl_errno($curl)) {
       
    } else {
        throw new Exception(curl_error($curl));
    }

    echo $response;
    curl_close($curl);
}

