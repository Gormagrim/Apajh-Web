<?php
include_once "header.php";
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <h1>Vidéothèque des signes</h1>
            <p>Taper un mot si dessous pour le rechercher.</p>
        </div>
    </div>
    <div class="row">
        <div class="col-12 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 connexion">
            <div class="row">
                <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 formConnexion">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Taper un mot ici" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "footer.php";
?>