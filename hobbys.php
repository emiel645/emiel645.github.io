<?php
include 'includes/db.php';
include 'includes/header.php';

$stmt = $pdo->query("SELECT * FROM hobbys");
$hobbys = $stmt->fetchAll();
?>

<h1>Mijn Hobby's</h1>

<style>
    body {
    background-color: #f5f7fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
  }
    .grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, 250px);
    gap: 20px;
    padding: 20px;
    justify-content: center; 
}
    .hobby {
    width: 250px;
    height: 320px;
    border: 1px solid #ccc;
    border-radius: 8px;
    padding: 15px;
    background-color: #f9f9f9;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-start;
    overflow: hidden;
    box-sizing: border-box;
    text-align: center;
}

.hobby img {
    width: 100%;         /* vult de breedte van de container */
    height: 180px;       /* vaste hoogte voor alle afbeeldingen */
    object-fit: cover;   /* zorgt dat afbeelding netjes vult zonder vervormen */
    border-radius: 4px;
    margin-bottom: 15px;
}

.hobby a {
    font-size: 18px;
    color: #007bff;
    text-decoration: none;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    width: 100%;
}
</style>

<div class="grid">
    <?php foreach ($hobbys as $hobby): ?>
        <div class="hobby">
            <img src="img/<?= htmlspecialchars($hobby['afbeelding_url']) ?>" alt="<?= htmlspecialchars($hobby['naam']) ?>">
            <a href="hobby.php?id=<?= $hobby['id'] ?>"><?= htmlspecialchars($hobby['naam']) ?></a>
        </div>
    <?php endforeach; ?>
</div>

<?php include 'includes/footer.php'; ?>
