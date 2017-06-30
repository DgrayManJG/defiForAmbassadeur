<?php
session_start();
require_once('../Controllers/LoginController.php');
require_once('../Controllers/NewPasswordController.php');

if (isset($_POST['deconnexion'])) {
    $login = new LoginController(false, false);
    $login->deconnexion();
}

if (!isset($_SESSION['username'])) {
    header('Location: ../');
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="../Assets/css/style.css" rel="stylesheet">
    </head>

    <nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse fixed-top">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
          <h4>
            <?php 
                if (isset($_SESSION['username'])) {
                    echo "Bonjour " . $_SESSION['username'];
                } 
            ?>
        </h4>  
      </a>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Accueil <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="newPassword.php">Changer mot de passe<span class="sr-only"></span></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="">
            <input type="submit" class="btn btn-link" id="deconnexion" name="deconnexion" value="Deconnexion">
        </form>
      </div>
    </nav>