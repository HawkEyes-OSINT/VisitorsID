<?php
header('Content-Type: application/json');

$client_ip = $_SERVER['REMOTE_ADDR'];

$input = file_get_contents("php://input");
$data = json_decode($input, true);

if ($data) {
    $data['ip'] = $client_ip;
    $logFile = 'logs.txt';
    $logEntry = json_encode($data) . "\n";
    file_put_contents($logFile, $logEntry, FILE_APPEND);
    echo json_encode(["status" => "success", "ip" => $client_ip]);
} else {
    echo json_encode(["status" => "error", "message" => "No data received"]);
}
?>
