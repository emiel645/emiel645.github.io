<?php
include 'includes/db.php';
include 'includes/header.php';

// Hobby's ophalen
$stmt = $pdo->query("SELECT * FROM hobbys ORDER BY id");
$hobbys = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
  body {
    background-color: #f5f7fa;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    color: #333;
    margin: 0;
    padding: 0;
  }

  .container {
    max-width: 900px;
    margin: 40px auto;
    background: white;
    padding: 30px 40px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.1);
  }

  #about-me {
    margin-bottom: 60px;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
  }

  #about-me p {
    font-size: 1.15rem;
    line-height: 1.6;
    margin-bottom: 15px;
  }

  #about-me img {
    max-width: 300px;
    width: 90%;
    border-radius: 12px;
    display: block;
    margin: 30px auto 0 auto;
    box-shadow: 0 4px 15px rgba(0,86,179,0.3);
  }

  #hobby-section {
    background-color: #fff;
    padding: 40px 30px;
    border-radius: 12px;
    box-shadow: 0 6px 15px rgba(0,0,0,0.08);
    text-align: center;
  }

  #hobby-section h1 {
    margin-bottom: 40px;
  }

  #hobby-navigation {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 30px;
    margin-bottom: 30px;
  }

  #hobby-navigation button {
    font-size: 2.5rem;
    background: none;
    border: none;
    color: #0056b3;
    cursor: pointer;
    user-select: none;
    transition: color 0.3s ease;
  }
  #hobby-navigation button:hover {
    color: #003d80;
  }

  #hobby-image {
    max-width: 400px;
    width: 90%;
    border-radius: 12px;
    box-shadow: 0 8px 25px rgba(0,86,179,0.3);
  }

  #hobby-name {
    font-size: 1.8rem;
    margin-top: 20px;
    color: #0056b3;
  }
</style>

<div class="container" id="about-me">
  <h1>Over mij</h1>
  <p>Ik ben Emiel Liefhebber, een student op het Talland College in Alkmaar en ik ben 18 jaar.</p>
  <p>Mijn opleiding is software developer en ik wil later programmeur worden.</p>
  <img src="img/mijzlef.jpg" alt="Foto van Emiel">
</div>

<div class="container" id="hobby-section">
  <h1>Mijn Hobby's</h1>

  <div id="hobby-navigation">
    <button id="prev-hobby" aria-label="Vorige hobby">⬅️</button>
    <div>
      <img id="hobby-image" src="" alt="Hobby afbeelding">
      <div id="hobby-name"></div>
    </div>
    <button id="next-hobby" aria-label="Volgende hobby">➡️</button>
  </div>
</div>

<script>
  // PHP array omzetten naar JavaScript
  const hobbys = <?= json_encode($hobbys, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP) ?>;

  let currentIndex = 0;

  const hobbyImage = document.getElementById('hobby-image');
  const hobbyName = document.getElementById('hobby-name');
  const prevButton = document.getElementById('prev-hobby');
  const nextButton = document.getElementById('next-hobby');

  function showHobby(index) {
    const hobby = hobbys[index];
    hobbyImage.src = "img/" + hobby.afbeelding_url;
    hobbyImage.alt = hobby.naam;
    hobbyName.textContent = hobby.naam;
  }

  prevButton.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + hobbys.length) % hobbys.length;
    showHobby(currentIndex);
  });

  nextButton.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % hobbys.length;
    showHobby(currentIndex);
  });

  // Init eerste hobby tonen
  showHobby(currentIndex);
</script>

<?php include 'includes/footer.php'; ?>
