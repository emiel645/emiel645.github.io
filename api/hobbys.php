<?php
require '../includes/db.php';

header('Content-Type: application/json');

$stmt = $pdo->query("SELECT * FROM hobbys ORDER BY id");
$hobbys = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($hobbys);
