<?php
session_start();
require 'includes/db.php';

if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo "Niet ingelogd.";
    exit;
}

if (isset($_POST['reactionTime'])) {
    $user_id = $_SESSION['user_id'];
    $reactionTime = (int) $_POST['reactionTime'];

    try {
        // Alleen opslaan als het sneller is dan de vorige, of als er nog geen score is
        $stmt = $pdo->prepare("
            INSERT INTO reaction_times (user_id, time_ms)
            VALUES (?, ?)
            ON DUPLICATE KEY UPDATE time_ms = LEAST(time_ms, VALUES(time_ms))
        ");
        $stmt->execute([$user_id, $reactionTime]);

        echo "Tijd opgeslagen!";
    } catch (PDOException $e) {
        http_response_code(500);
        echo "Databasefout: " . $e->getMessage();
    }
} else {
    echo "Geen data ontvangen.";
}