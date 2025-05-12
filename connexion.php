<?php
session_start();
$utilisaeur_correct ="baay-code";
$mot_de_passe_correct = "saamaamSeex";

if ($_SERVER["REQUEST_METHOD"]==="POST"){
    $login = $_POST['login'];
    $password = $_POST['password'];

    if ($login === $utilisaeur_correct && $password === $mot_de_passe_correct) {
        // si l'utilisateur est connecter
        $_SESSION['login'] = $login;
        header("Location: Reservation.php");// renvoie l'utilisateur vers la page de réservation
        exit();
    } else {
        // si la connection echoue
        header("Location: Login.php?error=1");// renvoie l'utilisateur vers la page de connexion avec un message d'erreur
        exit();
    }
}
?>