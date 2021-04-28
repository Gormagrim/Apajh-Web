<?php
$page = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script language="JavaScript" type="text/javascript" src="assets/js/jquery-3.6.6.js"></script>
    <link rel="stylesheet" href="assets/css/style.css" />
    <title>Apajh | SAINT-QUENTIN</title>
    <!-- Balise de desindexation provisoire -->
    <meta name="robots" content="noindex, nofollow">
</head>

<body>
    <div id="loader">

    </div>
    <script>
        $(document).ready(function() {
            $('#loader').fadeOut(500);
        })
    </script>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/webapp/public"><img class="logo" src="assets/img/logo4.png" alt="Logo de l'Apajh"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/webapp/public/qui-sommes-nous">Qui sommes-nous ?</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/webapp/public/blog">Le blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/webapp/public/auditif">Vidéothèque LSF</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Ressources
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Divers</a></li>
                            <li><a class="dropdown-item" href="#">Jeux éducatifs</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="login"></div>

            </div>
        </div>
    </nav>
    <div class="modal fade" id="myModal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content text-center">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" id="exampleModalLabel">Session expirée</h5>
                    Merci de vous connecter à nouveau !
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn modalBtn" id="modalBtn"><a href="/webapp/public/connexion">Se connecter</a></button>
                </div>
            </div>
        </div>
    </div>