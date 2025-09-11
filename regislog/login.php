<?php 
include '../includes/config.php';

$message = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = trim($_POST["email"]??'');
    $password = trim($_POST["motdepasse"]??'');

    if($email === '' || $password === ''){
        $message = "Tous les champs sont obligatoires.";
    }else{
        $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows == 1){
            $stmt->bind_result($id, $username, $hash);
            $stmt->fetch();

            if(password_verify($password, $hash)){
                $_SESSION['user_id'] = $id;
                $_SESSION['flash'] = "Bienvenue $username ! Vous êtes à présent connecté. Vous pouvez réagir aux articles et laisser des commentaires.";
                    header("Location: ../Accueil.php");
                    exit;
            }else{
                $message = "Mot de passe incorrect.";
            }
        }else{
            $message = "Aucun compte trouvé avec cet email.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5" style="max-width:640px;">
    <h1 class="mb-4 text-center">Connexion</h1>

    <?php if ($message): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div>
    <?php elseif (isset($_GET['success'])): ?>
        <div class="alert alert-success">Inscription réussie ! Connectez-vous maintenant.</div>
    <?php endif; ?>

    <form method="POST" novalidate>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="motdepasse" class="form-label">Mot de passe</label>
            <input id="motdepasse" name="motdepasse" type="password" class="form-control" required>
        </div>

        <button class="btn btn-primary" type="submit">Se connecter</button>
    </form>
    <div class="mt-3">
        <a href="forgot_password.php">Mot de passe oublié ?</a><br>
        <a href="register.php">Vous n'avez pas encore de compte ? Créez-en un ici</a>
    </div>
</div>
</body>
</html>
