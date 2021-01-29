<?php
include_once "header.php";
include_once "api.php";
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <h1>Connexion</h1>
            <p>Vous n'avez pas encore de compte ? cliquez <a href="/webapp/inscription.php">ici</a> pour vous inscrire.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 connexion">
            <div class="row">
                <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 formConnexion">
                    <form action="connexion.php" method="POST">
                        <label for="mail" class="form-label">Adresse mail</label>
                        <input type="mail" class="form-control" id="mail" placeholder="votre-adresse@e-mail.fr" />
                        <label for="password" class="form-label">Mot de passe</label>
                        <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control" id="password" autocomplete="on" placeholder="Votre mot de passe" />
                            <span class="input-group-text" id="basic-addon1"><a class="eye" href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a></span>
                        </div>
                        <span class="smallText"><a href="/">Mot de pass oublié ?</a></span>
                        <button type="submit" class="btn btn-primary connexionButton">Valider</button>
                    </form>
                    <?php 
                    if(!empty($_POST['mail']) && !empty($_POST['password'])){
                        $login = ([
                            'mail' => $_POST['mail'],
                            'password' => $_POST['password']
                            ]);
                            callAPI('POST', 'http://localhost/apiApajhv0/public/v1', $login);
                            echo $result;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "footer.php";
?>