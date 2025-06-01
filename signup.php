<?php
session_start();
require 'includes/db.php'; 

$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error = "Vul alle velden in.";
    } elseif ($password !== $confirm_password) {
        $error = "Wachtwoorden komen niet overeen.";
    } else {
        // Controleer of gebruikersnaam al bestaat
        $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->execute([$username]);

        if ($stmt->rowCount() > 0) {
            $error = "Gebruikersnaam bestaat al.";
        } else {
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            if ($stmt->execute([$username, $hashed_password])) {
                $_SESSION["user_id"] = $pdo->lastInsertId();
                header("Location: game.php");
                exit;
            } else {
                $error = "Er ging iets mis bij het aanmaken van je account.";
            }
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container" style="max-width:400px; margin: 60px auto; padding: 40px 30px; background:white; border-radius:12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); text-align:center;">
  <h2 style="color:#0056b3; margin-bottom:30px;">Registreren</h2>

  <form method="POST" autocomplete="off">
    <input type="text" name="username" placeholder="Gebruikersnaam" required
      style="width:100%; padding:12px 15px; margin:15px 0 20px 0; border:1.8px solid #ddd; border-radius:8px; font-size:16px;">
    <input type="password" name="password" placeholder="Wachtwoord" required
      style="width:100%; padding:12px 15px; margin:15px 0 20px 0; border:1.8px solid #ddd; border-radius:8px; font-size:16px;">
    <input type="password" name="confirm_password" placeholder="Bevestig wachtwoord" required
      style="width:100%; padding:12px 15px; margin:15px 0 20px 0; border:1.8px solid #ddd; border-radius:8px; font-size:16px;">
    <button type="submit"
      style="width:100%; padding:14px; background:#0056b3; border:none; color:white; font-size:18px; border-radius:8px; cursor:pointer;">
      Account aanmaken
    </button>
  </form>

  <!-- Feedbackmeldingen netjes onder het formulier -->
  <?php if (!empty($error)): ?>
    <p style="color:#d9534f; font-weight:600; margin-top:25px;"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <?php if (!empty($success)): ?>
    <p style="color:green; font-weight:600; margin-top:25px;"><?= htmlspecialchars($success) ?></p>
  <?php endif; ?>

  <p style="margin-top:30px; font-size:14px; color:#666;">
    Heb je al een account?
    <a href="login.php" style="color:#0056b3; font-weight:600; text-decoration:none;">Log hier in</a>
  </p>
</div>

<?php include 'includes/footer.php'; ?>

