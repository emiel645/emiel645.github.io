<?php
session_start();
header('Content-Type: application/json');

require '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"] ?? '';
    $password = $_POST["password"] ?? '';

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            echo json_encode(["success" => true, "user_id" => $user["id"]]);
            exit;
        } else {
            echo json_encode(["success" => false, "message" => "Ongeldig wachtwoord."]);
            exit;
        }
    } else {
        echo json_encode(["success" => false, "message" => "Gebruiker niet gevonden."]);
        exit;
    }
}

echo json_encode(["success" => false, "message" => "Ongeldig verzoek."]);
