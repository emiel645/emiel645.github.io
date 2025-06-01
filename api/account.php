<?php
session_start();
header('Content-Type: application/json');

require '../includes/db.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    echo json_encode(["error" => "Niet ingelogd"]);
    exit;
}

$user_id = $_SESSION['user_id'];

$stmt = $pdo->prepare("SELECT time_ms FROM reaction_times WHERE user_id = ?");
$stmt->execute([$user_id]);
$time = $stmt->fetchColumn();

echo json_encode(["time_ms" => $time]);
