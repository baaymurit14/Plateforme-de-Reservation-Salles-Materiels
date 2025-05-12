<?php
session_start();
include "base.php"; // Inclure le fichier de connexion à la base de données
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            margin:0;
            padding:0;
            height:100vh;
            display: flex;
            justify-content:center;
            align-items:center;
            background: #f0f0f0;
            font-family:Arial,sans-serif;
            box-sizing: border-box; /* Assure que padding et bordures ne dépassent pas la largeur */
        }
        form {
            background:rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
         form h1{
            text-align:center;
            margin-bottom: 20px;
         }

         label {
            display: block;
            margin:10px 0 5px;
         }

        input[type="text"],input[type="password"]{
            width:100%;
            padding:8px;
            margin-bottom:15px;
            border: 1px solid #ccc;
            border-radius:5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color:#2c7be5;
            color:white;
            border: none;
            border-radius:5px;
            cursor:pointer;
            margin-top:10px;
        }
        button:hover{
            background-color:#1a5bb8;
        }
        .liens {
        margin-top: 15px;
        text-align: center;
        }

        .liens a {
        color: #2c7be5;
        text-decoration: none;
        display: block;
        margin-top: 5px;
        font-family: 'Times New Roman', Times, serif;
        }

        .liens a:hover {
        text-decoration: underline;
        }
    </style>
</head>
<body>
    <div>
        
    <form method="POST" action="connexion.php">
  
        <h1>Connexion</h1>
        <?php
        // Vérification de la connexion
        if (isset($_GET['error']) && $_GET['error'] == 1) {
            echo "<p style='color: red; text-align: center;'>Login ou mot de passe incorrect.</p>";
        } elseif (isset($_GET['error']) && $_GET['error'] == 2) {
            echo "<p style='color: red; text-align: center;'>Veuillez remplir tous les champs.</p>";
        } elseif (isset($_GET['success']) && $_GET['success'] == 1) {
            echo "<p style='color: green; text-align: center;'>Inscription réussie. Vous pouvez vous connecter.</p>";
        }
        ?>
    <label for="">login</label>
    <input type="text" name="login" id="login" required>
    <label for="">password</label>
    <input type="password" name="password" id="password" required>
    <input type="checkbox" id="showPassword" onclick="togglePassword()">Afficher le mot de passe
    <button type="submit" name="connect">Se Connecter</button>
    <div class="liens">
        <a href="Motdepasse_oublier.php">Mot de passe oublier</a>
        <a href="CreeunCompte.php">Crée un compte</a>
    </div>
    <script>
        // Fonction pour afficher/masquer le mot de passe
        function togglePassword() {
            var passwordField = document.getElementById("password");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        // Nettoie l'URL après affichage du message
    if (window.location.search.includes("error=1") || window.location.search.includes("error=2") || window.location.search.includes("success=1")) {
        const url = new URL(window.location);
        url.search = ""; // supprime tous les paramètres
        window.history.replaceState({}, document.title, url);
    }
    </script>
    </form>
    </div>
</body>
</html>