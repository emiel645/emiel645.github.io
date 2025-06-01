<?php
require '../includes/db.php';

header('Content-Type: application/json');

$stmt = $pdo->query("SELECT id, naam, afbeelding_url FROM hobbys");
$hobbys = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($hobbys);
