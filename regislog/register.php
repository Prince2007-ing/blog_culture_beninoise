<?php 
include '../includes/config.php';

$message = "";
$old_nom = "";
$old_email = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nom = trim($_POST["nom"]??'');
    $email = trim($_POST['email']??'');
    $password1 = trim($_POST['motdepasse']??'');
    $password2 = trim($_POST['motdepasse2']??'');

    $old_nom = htmlspecialchars($nom,ENT_QUOTES,'UTF-8');
    $old_email = htmlspecialchars($email,ENT_QUOTES,'UTF-8');

    if($nom === '' || $email ==='' || $password1 === ''|| $password2 === ''){
        $message = "Tous les champs sont obligatoires.";
    }elseif($password1 !== $password2){
        $message = "Les mots de passe ne correspondent pas.";
    }elseif(strlen($password1) < 8 || 
             !preg_match('/[A-Za-z]/',$password1) || 
             !preg_match('/[0-9]/',$password1) || 
             !preg_match('/[^A-Za-z0-9]/',$password1)){
        $message = "Le mot de passe doit contenir au moins 8 caractères, une lettre, un chiffre et un symbole.";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $message = "Adresse email invalide.";
    }else{
        $stmt = $conn->prepare("SELECT id FROM users WHERE email =?");
        if(!$stmt){
            $message = "Erreur préparation requête : ".$conn->error;
        }else{
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            
            if($stmt->num_rows > 0){
                $message = "Cet email est déjà utilisé.";
            }else{
                $hash = password_hash($password1, PASSWORD_DEFAULT);
                $ins = $conn->prepare("INSERT INTO users (username,email,password,role) VALUES(?, ?, ?, 'user')");
                if(!$ins){
                    $message = "Erreur préparation insertion: ". $conn->error;
                }else{
                    $ins->bind_param("sss", $nom, $email, $hash);
                    if($ins->execute()){
                        $_SESSION['flash'] = "Compte créé avec succès ! Connectez-vous maintenant.";
                        header("Location: login.php");
                        exit;
                    }else{
                        $message = "Erreur lors de la création du compte".$ins->error;
                    }
                    $ins->close();
                }
            }
            $stmt->close();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container my-5" style="max-width:640px;">
    <h1 class="mb-4 text-center">Inscription</h1>

    <?php if ($message): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></div>
    <?php endif; ?>

    <form method="POST" novalidate>
        <div class="mb-3">
            <label for="nom" class="form-label">Nom d'utilisateur</label>
            <input id="nom" name="nom" class="form-control" required value="<?php echo $old_nom; ?>">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" type="email" class="form-control" required value="<?php echo $old_email; ?>">
        </div>

        <div class="mb-3">
            <label for="motdepasse" class="form-label">Mot de passe</label>
            <input id="motdepasse" name="motdepasse" type="password" class="form-control" required>
            <div class="form-text">Au moins 8 caractères, avec lettres, chiffres et symboles.</div>
        </div>
        <div class="mb-3">
            <label for="motdepasse2" class="form-label">Confirmez le mot de passe</label>
            <input id="motdepasse2" name="motdepasse2" type="password" class="form-control" required>
        </div>

        <button class="btn btn-primary" type="submit">S'inscrire</button>
        <a class="btn btn-link" href="login.php">Déjà un compte ? Se connecter</a>
    </form>
</div>
</body>
</html>
