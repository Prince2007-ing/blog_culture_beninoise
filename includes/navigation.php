<button class="menu-toggle" onclick="toggleMenu()">☰</button>
<nav class="navigation">
  <a href="Accueil.php">Accueil</a>
  <a href="Gastronomie.php">Gastronomie</a>
  <a href="Infrastructures.php">Infrastructure</a>
  <a href="Startups.php">Startups</a>
  <a href="Tourisme_histoire.php">Tourisme/Histoire</a>

  <?php if (isset($_SESSION['user_id'])): ?>
      <a href="regislog/profil.php">Profil</a>
      <a href="regislog/logout.php">Déconnexion</a>
  <?php else: ?>
      <a href="regislog/login.php" class="btn-login">Connexion / Inscription</a>
  <?php endif; ?>

  <a href="Contact.php">Contact</a>
  <a href="A_propos.php">À propos</a>
</nav>