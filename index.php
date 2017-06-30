<?php
session_start();
require_once('Controllers/LoginController.php');

if (isset($_SESSION['username'])) {
    header('Location: views/home.php');
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $login = new LoginController($_POST['username'], $_POST['password']);
    $result = $login->login();
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="Assets/css/login.css" rel="stylesheet">
        <link href="Assets/css/bootstrap.min.css" rel="stylesheet">
    </head>  

    <body>
    <br>
    <div class="container">
        <?php
        if (isset($result)) {
            if ($result == true) {
                //header('Location: http://newroman.net/nyancat/');
                header('Location: views/home.php');
            } elseif ($result == false) {
                echo "<div class=\"alert alert-danger\">
                        <strong>Alerte!</strong> Mauvais identifiant et/ou mauvais mot de passe.
                      </div>";
            }
        } 
        ?>
    </div>       
            
        <div class="login">
            <h1>Identification</h1>
            <form method="post" action="">
                <div class="form-group">
                    <input type="text" name="username" placeholder="Email ou identifiant" required="required" />
                </div>
                <div class="form-group">
                    <input class"mt-lg" type="password" name="password" placeholder="Mot de passe" required="required" />
                </div>
                <div>
                    <button type="submit" class="btn btn-primary btn-block btn-large">Connexion</button>
                </div>
            </form>
            
        </div>
    </body>
</html>
