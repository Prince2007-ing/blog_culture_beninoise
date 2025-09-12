<?php 
$pageTitle = "Benintôché-Gastronomie";
include 'includes/config.php';
include 'includes/header.php';
$_GET['category'] = 'gastronomie';
include 'includes/liste_articles.php';
?>

<body class="bg-light">
  <header>
    <h1>Gastronomie locale</h1>
    <?php include 'includes/navigation.php'; ?>
  </header>
  <main>
    <section class="section-gastronomie">
      <h1>Saveurs locales</h1>
      <p>
      <em>Savourez l’âme du Bénin dans chaque bouchée.</em> <br>
      De l’amiwo rouge éclatant à la douceur du gari, des sauces
      parfumées aux boissons locales, la gastronomie béninoise 
      est un festival de couleurs et de goûts. Plus qu’un repas,
      c’est une expérience sensorielle, un voyage au cœur de nos
      traditions culinaires… à déguster sans modération !
        Explorez les plats typiques, les spécialités régionales. </p>
      <h3> Présentation des plats typiques (amiwo, sauce arachide, akassa, tchoukoutou...)</h3> 
      <div>
        <img src="images/gastronomie.jpeg" alt="image cuisinier noir"> <br><br><br>
        <img src="images/Akassa_jus_poisson.jpeg" alt="akassa"> <br><br><br>
        <img src="images/Amiwô.jpeg" alt="amiwô"> <br><br><br>
        <img src="images/Atta_tévi.jpeg" alt="Atta_tévi"> <br><br><br>
        <img src="images/Pâte_noire.jpeg" alt="pate_noire"> <br><br><br>
        <img src="images/Wassawassa.jpeg" alt="Wassawassa"> <br><br><br>
        <img src="images/Pâte_blanche.jpeg" alt="Pâte_blanche"> <br><br><br>
        <img src="images/Piron_rouge.jpeg" alt="Piron_rouge">

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