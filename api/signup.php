<?php
session_start();
header('Content-Type: application/json');

require '../includes/db.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$confirm = $_POST['confirm_password'] ?? '';

if (!$username || !$password || !$confirm) {
    echo json_encode(['success' => false, 'message' => 'Vul alle velden in.']);
    exit;
}

if ($password !== $confirm) {
    echo json_encode(['success' => false, 'message' => 'Wachtwoorden komen niet overeen.']);
    exit;
}

$stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
$stmt->execute([$username]);
if ($stmt->rowCount() > 0) {
    echo json_encode(['success' => false, 'message' => 'Gebruikersnaam bestaat al.']);
    exit;
}

$hashed = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
if ($stmt->execute([$username, $hashed])) {
    $_SESSION["user_id"] = $pdo->lastInsertId();
    echo json_encode(['success' => true, 'message' => 'Account succesvol aangemaakt.']);
} else {
    echo json_encode(['success' => false, 'message' => 'Er ging iets mis bij het aanmaken.']);
}
