<?php 
// Si le titre de la page n'est pas défini, on le définit par défaut
if (!isset($pageTitle)) {
    $pageTitle = "Benintôché - Découvrez le Bénin sous un nouveau jour";
}
?>
<!DOCTYPE html>
<html lang="fr">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Feuilles de style spécifiques -->
    <link rel="stylesheet" href="principal.css">
    <link rel="stylesheet" href="A_propos.css">
    <link rel="stylesheet" href="Contact.css">
    <link rel="stylesheet" href="Infrastructures.css">
    <link rel="stylesheet" href="Startups.css">
    <link rel="stylesheet" href="Tourisme_Histoire.css">
    <link rel="stylesheet" href="Gastronomie.css">
    <link rel="stylesheet" href="Accueil.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
