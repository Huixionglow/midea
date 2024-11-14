<?php
$config = include('config.php');
$username = $config['username'];
$password = $config['password'];
$connectionString = $config['connect_string'];
$bearerToken = $config['token'];


$conn = oci_connect($username, $password, $connectionString);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$query = "SELECT COMPANY_CODE, BRANCH_CODE, WHSE_CODE, CUST_CODE, ENTRY_NUM, FROM_GRADE, TO_GRADE, TRANS_CODE
FROM (
    SELECT 
        J.COMPANY_CODE, 
        J.BRANCH_CODE, 
        J.WHSE_CODE, 
        J.CUST_CODE, 
        J.ENTRY_NUM, 
        D.FROM_GRADE, 
        D.TO_GRADE, 
        J.TRANS_CODE,
        ROW_NUMBER() OVER (PARTITION BY J.ENTRY_NUM ORDER BY (SELECT NULL FROM DUAL)) AS rn
    FROM WMADJ J
    LEFT JOIN WMADJD D ON J.ENTRY_NUM = D.ENTRY_NUM 
    WHERE (D.TO_GRADE IS NOT NULL OR D.TO_LOC IS NOT NULL)
      AND D.FROM_GRADE <> D.TO_GRADE
      AND J.CONFIRM_DATE > TO_DATE('2024-02-18', 'YYYY-MM-DD')
      AND J.COMPANY_CODE IN ('TNS', 'TNLS', 'TT')
      AND J.BRANCH_CODE IN ('SG', 'SA', 'BK')
      AND J.WHSE_CODE IN ('SNK', 'BULIM', 'WHI', 'A')
      AND J.CUST_CODE IN ('LEN-E', 'LEN', 'LEN-DC')
      AND J.TRANS_CODE = 'TR' 
      AND J.VOIDED = 'N'
      AND J.PHASE ='2'
      AND J.API_SENT_DATE IS NULL
) WHERE rn = 1";

$stid = oci_parse($conn, $query);
if (!$stid) {
    $e = oci_error($conn);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}

$r = oci_execute($stid);
if (!$r) {
    $e = oci_error($stid);
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$sloc_array = array();

while (($row = oci_fetch_array($stid, OCI_ASSOC)) !== false) {
    $sloc_array[] = array(
        'cust_code' => $row['CUST_CODE'],
        'company_code' => $row['COMPANY_CODE'],
        'branch_code' => $row['BRANCH_CODE'],
        'whse_code' => $row['WHSE_CODE'],
        'entry_number' => $row['ENTRY_NUM']
    );
}

$url = "https://wmsjbapi.tiongnam.com:8443/api-platform/public/jbwmsapi/lenovo/v1/stock_transfer";

foreach ($sloc_array as $item) {
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
        $updateQuery = "UPDATE WMADJ SET API_SENT_DATE = SYSDATE WHERE ENTRY_NUM = :entryNum";
        $updateStmt = oci_parse($conn, $updateQuery);

        oci_bind_by_name($updateStmt, ":entryNum", $item['entry_number']);

        if (!oci_execute($updateStmt)) {
            $e = oci_error($updateStmt);
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }

        oci_free_statement($updateStmt);
        echo "Updated API_SENT_DATE for ENTRY_NUM " . $item['entry_number'] . "\n";
    } else {
        throw new Exception(curl_error($curl));
    }

    echo "Response from API for ENTRY_NUM " . $item['entry_number'] . ": " . $response . "\n";
    curl_close($curl);
}


oci_free_statement($stid);
oci_close($conn);
