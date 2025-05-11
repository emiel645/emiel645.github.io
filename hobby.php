<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<?php
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM hobbys WHERE id = ?");
$stmt->execute([$id]);
$hobby = $stmt->fetch();

if ($hobby):
?>
    <h1><?php echo $hobby['naam']; ?></h1>
    <img src="img/<?php echo $hobby['afbeelding_url']; ?>" alt="<?php echo $hobby['naam']; ?>">
    <p><?php echo $hobby['beschrijving']; ?></p>

    <p>Hobby niet gevonden.</p>
    <?php
 endif; 

include 'includes/footer.php'; ?>
