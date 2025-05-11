<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<h1>Welkom op mijn portfolio</h1>
<h2>Mijn hobby’s</h2>

<div class="hobby-container">
    <?php
    $stmt = $pdo->query("SELECT * FROM hobbys");
    while ($row = $stmt->fetch()) {
        echo "<div class='hobby-card'>";
        echo "<a href='hobby.php?id=" . $row['id'] . "'>";
        echo "<img src='img/" . $row['afbeelding_url'] . "' alt='" . $row['naam'] . "'>";
        echo "<h3>" . $row['naam'] . "</h3>";
        echo "</a>";
        echo "</div>";
    }
    ?>
</div>

<?php include 'includes/footer.php'; ?>
