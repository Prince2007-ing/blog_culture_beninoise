<?php 
$pageTitle = "Benintôché-Tourisme & Histoire";
include 'includes/config.php';
include 'includes/header.php';
$_GET['category'] = 'tourisme_histoire';
include 'includes/liste_articles.php';
?>

<body>
  <header>
    <h1>Tourisme et patrimoine</h1>
    <?php include 'includes/navigation.php'; ?>
  </header>
  <main>
    <section class="section-tourisme">
      <h2>Sites historiques et attractions</h2>
      <p>
        <em>Un pays, mille histoires, mille merveilles.</em> 
        Laissez-vous charmer par la magie des palais royaux d’Abomey,
        par l’émotion du port de non-retour à Ouidah, ou par la beauté
        sauvage de la Pendjari. Le Bénin, c’est l’Afrique authentique,
        vibrante et accueillante. Chaque site est une aventure, chaque 
        lieu un souvenir. <br>
        Partez à la découverte des lieux emblématiques et de l’histoire locale.</p>
        <div>
          <img src="images/Place des souvenirs - Cotonou.jpeg" alt=""><br><br><br>
          <img src="images/place_goho.jpeg" alt=""><br><br><br>
          <img src="images/temple_python.jpeg" alt=""><br><br><br>
          <img src="images/Stade de l'amitié Cotonou-Bénin.jpeg" alt="Stade">
        </div>
         <div class = container my-5>
         <h1 class="text-center mb-4">Les articles</h1>
      </div>
      <div class="row">
        <?php if(count($rows) > 0): ?>
          <?php foreach($rows as $row): ?>
            <?php $id = (int) $row['id']; 
             $titre = htmlspecialchars($row['title']);
             $contenu = htmlspecialchars(mb_substr($rows['content'],0,150))."...";
             $cat = htmlspecialchars($row['category']);
             $image = !empty($row['image']) ? htmlspecialchars($row['image']) 
             :"https://via.placeholder.com/600*400 ?text=Pas+d'image"; ?>
               <div class="col-md-6 col-lg-4 mb-4">
                <div class="card shadow-sm h-100">
                  <img src="<?=$image ?>" class="card-img-top" alt="Image de l'article">
                  <div class="card-body">
                    <h5 class="card-title text primary"><?=$titre ?></h5>
                    <p class="card-text"><?= nl2br($contenu) ?></p>
                    <a href="article.php?id=<?= $id ?>" class="btn btn-sm btn-outline-primary">Lire plus</a>
                  </div>
                  <div class="card-footer text-muted"> Catégorie: <?=$cat ?></div>;
                </div> 
               </div>

          <?php endforeach; ?>
          </div>
      <?php else: ?>
        <p class="text-center">Aucun article trouvé</p> 
      <?php endif; ?>     
      </div>
    </section>
  </main>
<?php include 'includes/footer.php'; ?>