<?php
$pageTitle = "Accueil - Benintôché";
include 'includes/config.php';
include 'includes/header.php';
?>
<body>
  <header>
    <h1>Bienvenue sur notre site</h1>
    <div class="logo">Benintôché
    </div>
    <?php include 'includes/navigation.php'; ?>
  </header>
  <main>
    <?php if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-success" id="flash-message">
        <?php echo htmlspecialchars($_SESSION['flash']); ?>
    </div>
    <?php unset($_SESSION['flash']); ?>
    <?php endif; ?>
    </div>
    <section class="image-section">
      <div class="texte-content">
      <h2>Présentation générale</h2>
      <p class="taille_ecriture">
        <em>Bienvenue chez vous, au cœur du Bénin !</em> <br>
        Plongez dans un univers où <strong> tradition et modernité </strong>se rencontrent. Ici,
        chaque page est une invitation à explorer un pays riche en saveurs, en 
        histoire et en innovations. Laissez-vous guider par l’esprit <strong>Benintôché</strong>
        et découvrez un Bénin qui bouge, qui inspire et qui rayonne. 
        Découvrez notre univers à travers les différentes thématiques proposées : 
        sa gastronomie, ses startups, ses infrastructures, son histoire et son dynamisme moderne.
      </p>
      </div>
      <div class="image-container">
        <img src="images/vue_litoral.jpg" alt="images"> <br> <br> <br>
        <img src="images/Startups.jpg" alt="images"><br> <br> <br>
        

      </div>
    
    </section>


  </main>
  <?php include 'includes/footer.php'; ?>