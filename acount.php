<?php
session_start();
require 'includes/db.php'; 

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

// Haal snelste tijd op
$stmt = $pdo->prepare("SELECT time_ms FROM reaction_times WHERE user_id = ?");
$stmt->execute([$user_id]);
$time = $stmt->fetchColumn();
?>

<?php include 'includes/header.php'; ?>

<div class="container" style="max-width:600px; margin:60px auto; padding:40px 30px; background:white; border-radius:12px; box-shadow:0 8px 20px rgba(0,0,0,0.1); text-align:center;">
  <h2 style="color:#0056b3; margin-bottom:20px;">Welkom op je accountpagina</h2>

  <p style="font-size:1.2rem; margin-bottom:30px;">
    <strong>Jouw snelste reactietijd:</strong><br>
    <?= $time ? '<span style="color:#28a745; font-size:1.5rem;">' . htmlspecialchars($time) . ' ms</span>' : '<span style="color:#888;">Nog geen tijd gemeten.</span>' ?>
  </p>

  <form method="post" action="logout.php" onsubmit="return confirmLogout();">
    <button type="submit"
      style="padding:12px 24px; background:#d9534f; border:none; color:white; font-size:16px; border-radius:8px; cursor:pointer; transition: background-color 0.3s;">
      Log uit
    </button>
  </form>
</div>

<script>
function confirmLogout() {
  return confirm("Weet je zeker dat je wilt uitloggen?");
}
</script>

<?php include 'includes/footer.php'; ?>
