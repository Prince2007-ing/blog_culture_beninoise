<?php
include"config.php";
$conn->set_charset("utf8mb4");

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id <= 0) {
    die("Article invalide.");
}
$stmt = $conn->prepare("SELECT id, title, content, image, categorie FROM articles WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $article = $result->fetch_assoc();
} else {
    die("Article introuvable.");
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($article['titre']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <a href="liste_articles.php" class="btn btn-secondary mb-3">Retour à la liste</a>

    <div class="card shadow">
        <?php if (!empty($article['image'])): ?>
            <img src="<?= htmlspecialchars($article['image']) ?>" class="card-img-top" alt="Image article">
        <?php endif; ?>
        <div class="card-body">
            <h1 class="card-title"><?= htmlspecialchars($article['title']) ?></h1>
            <p class="card-text"><?= nl2br(htmlspecialchars($article['content'])) ?></p>
        </div>
        <div class="card-footer text-muted">
            Catégorie : <?= htmlspecialchars($article['category']) ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>