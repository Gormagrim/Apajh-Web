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
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="assets/css/style.css" />
    <?php
    if ($page == '/') { ?>
        <title>L'Apajh Web | SAINT-QUENTIN</title>
        <meta name="description" content="L'Apajh Web est le site internet de la fédération des Apajh de Saint Quentin. Venez utiliser notre vidéothèque de la langue des signes française !" />
    <?php } else if ($page == '/webapp/public/qui-sommes-nous') { ?>
        <title>L'Apajh Web | L'Apajh de présentation | SAINT-QUENTIN</title>
        <meta name="description" content="L'Apajh de présentation du site de la fédarétion des Apajh de Saint Quentin. Vous apprendrez qui nous sommes et quels sont nos services." />
    <?php } else if ($page == '/webapp/public/blog') { ?>
        <title>L'Apajh Web | L'Apajh Blog | SAINT-QUENTIN</title>
        <meta name="description" content="L'Apajh blog du site web de la fédération des Apajh de Saint Quentin. Vous y trouverez, entre autre, des articles concernant les activités de l'IME." />
    <?php } else if ($page == '/webapp/public/auditif') { ?>
        <title>L'Apajh Web | L'Apajh des signes | SAINT-QUENTIN</title>
        <meta name="description" content="L'Apajh des signes est la vidéothèque en langue des signes française de la fédération des Apajh de Saint Quentin. Contactez-nous si un mot n'y est pas." />
    <?php } else if ($page == '/webapp/public/auditif-categories') { ?>
        <title>L'Apajh Web | L'Apajh des catégories | SAINT-QUENTIN</title>
        <meta name="description" content="Recherchez directement les mots d'une catégorie dans la vidéotèque en langue des signes française de la fédération des Apajh de Saint Quentin." />
    <?php } else if ($page == '/webapp/public/jeux-educatifs') { ?>
        <title>L'Apajh Web | L'Apajh des jeux | SAINT-QUENTIN</title>
        <meta name="description" content="Venez tester les jeux éducatifs en ligne de la fédération des Apajh de Saint Quentin. Comparez votre score aux meilleurs joueurs de la fédération !" />
    <?php } else if ($page == '/webapp/public/compter-deposer') { ?>
        <title>L'Apajh Web | Apprendre à compter | SAINT-QUENTIN</title>
        <meta name="description" content="Le jeux parfait pour apprendre à compter aux plus jeunes, mais pas que ! Exercez-vous et comparez votre score aux meilleurs joueurs de la fédération !" />
    <?php } else if ($page == '/webapp/public/connexion') { ?>
        <title>L'Apajh Web | L'Apajh connexion | SAINT-QUENTIN</title>
        <meta name="description" content="l'Apajh connexion du site internet de la fédération des Apajh de Saint Quentin. Connectez-vous pour profiter de contenu personnalisé." />
    <?php } else if ($page == '/webapp/public/register') { ?>
        <title>L'Apajh Web | L'Apajh inscription | SAINT-QUENTIN</title>
        <meta name="description" content="L'Apajh inscription du site internet de la fédération des Apajh de Saint Quentin. Inscrivez-vous pour profiter de contenu personnalisé." />
    <?php } else if ($page == '/webapp/public/mon-compte') { ?>
        <title>L'Apajh Web | M'Apajh perso | SAINT-QUENTIN</title>
        <meta name="description" content="M'Apajh perso c'est mon compte sur le site internet de la fédération des Apajh de Saint Quentin. C'est la qu'on entre ses informations." />
    <?php } else if ($page == '/webapp/public/favoris') { ?>
        <title>L'Apajh Web | M'Apajh favoris | SAINT-QUENTIN</title>
        <meta name="description" content="L'Apajh des favoris concentre tous les articles ou vidéos que vous avez aimés. En un simple clic vous pouvez les retrouver sans chercher." />
    <?php }
    ?>


</head>
<script type="text/javascript" src="/tarteaucitron/tarteaucitron.js"></script>
<script type="text/javascript">
    tarteaucitron.init({
        "privacyUrl": "",
        /* Privacy policy url */

        "hashtag": "#tarteaucitron",
        /* Open the panel with this hashtag */
        "cookieName": "tarteaucitron",
        /* Cookie name */
        "orientation": "middle",
        /* Banner position (top - bottom) */
        "groupServices": false,
        /* Group services by category */
        "showAlertSmall": false,
        /* Show the small banner on bottom right */
        "cookieslist": false,
        /* Show the cookie list */
        "closePopup": false,
        /* Show a close X on the banner */

        "showIcon": true,
        /* Show cookie icon to manage cookies */
        //"iconSrc": "", /* Optionnal: URL or base64 encoded image */
        "iconPosition": "BottomRight",
        /* BottomRight, BottomLeft, TopRight and TopLeft */

        "adblocker": false,
        /* Show a Warning if an adblocker is detected */
        "DenyAllCta": true,
        /* Show the deny all button */
        "AcceptAllCta": true,
        /* Show the accept all button when highPrivacy on */
        "highPrivacy": true,
        /* HIGHLY RECOMMANDED Disable auto consent */
        "handleBrowserDNTRequest": false,
        /* If Do Not Track == 1, disallow all */

        "removeCredit": false,
        /* Remove credit link */
        "moreInfoLink": true,
        /* Show more info link */

        "useExternalCss": false,
        /* If false, the tarteaucitron.css file will be loaded */
        "useExternalJs": false,
        /* If false, the tarteaucitron.js file will be loaded */

        //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */
        "readmoreLink": "",
        /* Change the default readmore link */

        "mandatory": true,
        /* Show a message about mandatory cookies */
    });
</script>

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
            <a class="navbar-brand" href="/webapp/public"><img class="logo" src="assets/img/page-num2.png" alt="Logo de l'Apajh"></a>
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
                            <li><a class="dropdown-item" href="/webapp/public/divers">Divers</a></li>
                            <li><a class="dropdown-item" href="/webapp/public/jeux-educatifs">Jeux éducatifs</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle access" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Accessibilité
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>Taille de police <button class="policeMoins">-</button><button class="policePlus">+</button></li>
                            <li>Mode nuit</li>
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