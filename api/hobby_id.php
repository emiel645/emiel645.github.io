<?php
// api/get_hobby.php
require_once '../includes/db.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    http_response_code(400);
    echo json_encode(["error" => "Ongeldig ID"]);
    exit;
}

$id = (int) $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM hobbys WHERE id = ?");
$stmt->execute([$id]);
$hobby = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$hobby) {
    http_response_code(404);
    echo json_encode(["error" => "Hobby niet gevonden"]);
    exit;
}

header('Content-Type: application/json');
echo json_encode($hobby);
