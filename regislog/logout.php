<?php
include '../includes/config.php';
session_unset();
session_destroy();

session_start();
$_SESSION['flash'] = "Vous n'êtes plus connecté. <a href = login.php >Reconnectez-vous ici<a> pour réagir aux articles.";
header("Location: ../Accueil.php");
exit;
?>

