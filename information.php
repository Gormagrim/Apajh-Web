<?php
include_once "header.php";
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <h1>Mon compte</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 acount">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <button type="button" class="btn-close closer" onclick="history.go(-1)" aria-label="Close"></button>
                </div>
            </div>
            <img class="avatar" src="assets/img/flower.svg" alt="..." class="img-thumbnail">
            <span type="button" class="btn btn-info addPhoto" title="Changer votre photo de profil">+</span>
            <div class="row">
                <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 text-center mail">
                    <span class="">exemple-mail@mail.fr</span>
                </div>
                <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 text-center">
                    <a class="btn btn-secondary" href="/webapp/passwordModification.php">Modifier mon mot de passe</a>
                </div>
            </div>
            <div class="row civility">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <span class="civilityType">Nom : </span>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <input type="text" class="form-control information" id="firstname" placeholder="Votre nom" />
                </div>
            </div>
            <div class="row civility">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <span class="civilityType">Prénom : </span>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <input type="text" class="form-control information" id="lastname" placeholder="Votre prénom" />
                </div>
            </div>
            <div class="row civility">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <span class="civilityType">Ville : </span>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <input type="text" class="form-control information" id="city" placeholder="Votre ville" />
                </div>
            </div>
            <div class="row civility">
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <span class="civilityType">Fonction : </span>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <input type="text" class="form-control information" id="function" placeholder="Votre fonction" />
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 text-center">
                    <a class="btn btn-secondary modification" href="">Valider</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "footer.php";
?>