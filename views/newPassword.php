<?php include 'header.php'; ?>

<?php

if (isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['newPassword1'])) {
    $newPassword = new NewPasswordController($_SESSION['username'], $_POST['oldPassword'], $_POST['newPassword'], $_POST['newPassword1']);
    $result = $newPassword->newPassword();
}

?>
<body>
    
    <div class="container">

            <?php
            if (isset($result)) {
                if ($result == true) {
                    echo "<div class=\"alert alert-success\">
                            <strong>Success!</strong> Votre mot de passe a bien été changé avec succès, veuillez vous déconnecter et reconnecter pour appliquer le changement.
                        </div>";
                } elseif ($result == false) {
                    echo "<div class=\"alert alert-danger\">
                            <strong>Alerte!</strong> L'ancien mot de passe ou les deux champs nouveau mot de passe ne correspondent pas.
                        </div>";
                }
            }
        ?>
        
        <div class="row">
            <div class="starter-template">
                <h1>Nouveau mot de passe</h1>
                <br>
                <form method="post" action="">
                    <div class="form-group">
                        <input type="password" class="form-control" name="oldPassword" placeholder="Ancien Mot de passe" required="required" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="newPassword" placeholder="Nouveau mot de passe" required="required" />
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="newPassword1" placeholder="Réecrire nouveau mot de passe" required="required" />
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Nouveau mot de passe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>


<?php include 'footer.php'; ?>
