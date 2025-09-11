<?php 
$pageTitle = "Benintôché-Contactez-nous";
include 'includes/config.php';
include 'includes/header.php';
?>
<body>
  <header>
    <h1>Contactez-nous ?</h1>
    <?php include 'includes/navigation.php'; ?>
  </header>
  <main>
    <section >
      <p>
        <em> Parlons-en ensemble !</em> <br>
        Vous avez une question, une collaboration 
        à proposer ou simplement envie d’échanger ?
        Écrivez-nous ! Votre message est le premier 
        pas d’un partenariat ou d’une belle aventure partagée.
      </p>
      <h2>Formulaire de contact</h2>
      <form>
        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom"><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <label for="message">Message:</label><br>
        <textarea id="message" name="message"></textarea><br>
        <button type="submit">Envoyer</button>
      </form>
    </section>
  </main>
<?php include 'includes/footer.php'; ?>