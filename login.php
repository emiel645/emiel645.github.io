<?php
session_start();
require 'includes/db.php'; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();
        if (password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            header("Location: game.php"); 
            exit;
        } else {
            $error = "Ongeldig wachtwoord.";
        }
    } else {
        $error = "Gebruiker niet gevonden.";
    }
}
?>

<?php include 'includes/header.php'; ?>

<div class="container" style="max-width:400px; margin: 60px auto; padding: 40px 30px; background:white; border-radius:12px; box-shadow: 0 8px 20px rgba(0,0,0,0.1); text-align:center;">
  <h2 style="color:#0056b3; margin-bottom:30px;">Login</h2>

  <form method="POST" autocomplete="off">
    <input type="text" name="username" placeholder="Gebruikersnaam" required
      style="width:100%; padding:12px 15px; margin:15px 0 20px 0; border:1.8px solid #ddd; border-radius:8px; font-size:16px;">
    <input type="password" name="password" placeholder="Wachtwoord" required
      style="width:100%; padding:12px 15px; margin:15px 0 20px 0; border:1.8px solid #ddd; border-radius:8px; font-size:16px;">
    <button type="submit"
      style="width:100%; padding:14px; background:#0056b3; border:none; color:white; font-size:18px; border-radius:8px; cursor:pointer;">
      Login
    </button>
  </form>

  <!-- Foutmelding met extra ruimte erboven -->
  <?php if (isset($error)): ?>
    <p style="color:#d9534f; font-weight:600; margin:25px 0 10px 0;"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <p style="margin-top:25px; font-size:14px; color:#666;">
    Heb je nog geen account?
    <a href="signup.php" style="color:#0056b3; font-weight:600; text-decoration:none;">Registreer hier</a>
  </p>
</div>

<?php include 'includes/footer.php'; ?>