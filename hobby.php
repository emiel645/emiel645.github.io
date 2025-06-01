<?php
include 'includes/db.php';
include 'includes/header.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo "<p>Ongeldig ID</p>";
    exit;
}

$id = (int) $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM hobbys WHERE id = ?");
$stmt->execute([$id]);
$hobby = $stmt->fetch();

if (!$hobby) {
    echo "<p>Hobby niet gevonden.</p>";
    exit;
}
?>

<style>
  .hobby-image {
    display: block;
    margin: 20px auto;
    max-width: 600px;
    width: 90%;
    height: auto;
    border-radius: 8px;
  }
</style>

<a href="hobbys.php">← Terug naar overzicht</a>

<h1><?= htmlspecialchars($hobby['naam']) ?></h1>
<img src="img/<?= htmlspecialchars($hobby['afbeelding_url']) ?>" alt="<?= htmlspecialchars($hobby['naam']) ?>" class="hobby-image">
<p><?= nl2br(htmlspecialchars($hobby['beschrijving'])) ?></p>

<?php
include 'includes/footer.php';
?>
