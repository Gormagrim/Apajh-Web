<footer class="backgroundFooter mt-4">
    <div class="backgroundContainer1">
        <div class="container-fluid">
            <div class="row text-center clipPath">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <p class="networks mb-0 font-weight-bold">Rejoignez-nous sur les réseaux sociaux !</p>
                </div>
                <div class="col-lg-6">
                    <a class="socialN first" href="https://www.facebook.com"><i class="fab fa-facebook fa-2x"></i></a>
                    <a class="socialN" href="https://www.messenger.com"><i class="fab fa-facebook-messenger fa-2x"></i></a>
                    <a class="socialN" href="https://www.instagram.com"><i class="fab fa-instagram fa-2x"></i></a>
                    <a class="socialN" href="https://www.linkedin.com"><i class="fab fa-linkedin fa-2x"></i></a>
                    <a class="socialN" href="https://www.twitter.com"><i class="fab fa-twitter fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="container text-center text-lg-left mt-5">
        <div class="row">
            <div class="footerPart1 col-md-6 col-lg-6 mx-auto mb-1">
                <p class="title mb-4 text-uppercase font-weight-bold ">À propos de nous</p>
                <ul>
                    <li class="mb-4"><a href="/webapp/public/mentions-legales">Mentions légales</a></li>
                    <li class="mb-4"><a href="/webapp/public/mentions-legales#myCookies">Confidentialité et Cookies</a></li>
                </ul>
            </div>
            <div class="col-md-6 col-lg-6 mx-auto mb-4">
                <p class="title mb-4 text-uppercase font-weight-bold">Contact</p>
                <ul class="contact">
                    <li class="mb-4"><i class="fas fa-home mr-3"></i> Rue Charles Linné, 02100 Saint-Quentin</li>
                    <li class="mb-4"><i class="fas fa-envelope mr-3"></i><a href="mailto:contact@apajhweb.fr"> Nous contacter</a></li>
                    <li><i class="fas fa-phone mr-3"></i><a href="tel:+33323671513"> 03 23 67 15 13</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footerCopyright text-center py-3">©<?= date('Y') ?> Apajh Web</div>
</footer>
<script language="JavaScript" type="text/javascript" src="assets/js/jquery-3.6.6.js"></script>
<script script language="JavaScript" type="text/javascript" src="assets/js/jquery-ui.min.js"></script>
<!-- <script language="JavaScript" type="text/javascript" src="assets/js/draganddrop.js"></script> -->
<script language="JavaScript" type="text/javascript" src="assets/js/scriptGlisser.js"></script>
<script language="JavaScript" type="text/javascript" src="assets/js/jeuDeCartes.js"></script>
<script language="JavaScript" type="text/javascript" src="assets/js/codeMemory.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script language="JavaScript" type="text/javascript" src="assets/js/script.js"></script>
<script language="JavaScript" type="text/javascript" src="assets/js/ajax.js"></script>
<?php ($page == '/webapp/public/auditif' || $page == '/webapp/public/auditif-categories') ? require '../fetch/likeMatch.php' : '' ?>
<?php ($page == '/webapp/public/auditif-categories' || $page == '/webapp/public/auditif') ? require '../fetch/selectCategory.php' : '' ?>
<?php ($page == '/webapp/public/mon-compte') ? require '../fetch/addUserPhoto.php' : '' ?>
<?php ($page == '/webapp/public/mon-compte') ? require '../fetch/citiesSelect.php' : '' ?>
<?php ($page == '/webapp/public/favoris') ? require '../fetch/selectFavoris.php' : '' ?>
<?php ($page == '/webapp/public/admin') ? require '../fetch/addVideo.php' : '' ?>
<?php ($page == '/webapp/public/admin-word') ? require '../fetch/word.php' : '' ?>
<?php ($page == '/webapp/public/blog') ? require '../fetch/articleFetch.php' : '' ?>
<?php ($page == '/webapp/public/404') ? require '../fetch/p404.php' : '' ?>
<script type="text/javascript">
    tarteaucitron.user.googleFonts = 'families';
    (tarteaucitron.job = tarteaucitron.job || []).push('googlefonts');
</script>
<script>
    $(document).ready(function() {
        <?php if (!empty($_SESSION['token'])) {
            if (time() >  $_SESSION['logOutTime']) { ?>
                $('#myModal').modal('show')
                $('#modalBtn').on('click', function(event) {
                    <?php session_destroy(); ?>
                });
        <?php }
        } ?>
        <?php if (!empty($_SESSION['token'])) { ?>
            $('.login').html('<div class="btn-group dropstart"><button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><img class="addPhoto headerPhoto <?= ($_SESSION['ug'] == 1) ? 'admin' : (($_SESSION['ug'] == 2) ? 'direction' : (($_SESSION['ug'] == 3 || $_SESSION['ug'] == 4 || $_SESSION['ug'] == 5) ? 'service' : (($_SESSION['ug'] == 6) ? 'famille' : (($_SESSION['ug'] == 7) ? 'inscrit' : '')))) ?>" src="" alt=""></button><ul class="dropdown-menu"><li><a class="dropdown-item text-center" href="/webapp/public/mon-compte">Mon compte</a></li><li><a class="dropdown-item text-center" href="/webapp/public/favoris">Mes favoris</a></li><li><a class="dropdown-item text-center" href="#">Mon Apajh</a></li><li><form class="text-center" action="/webapp/public/deconnexion" method="post"><button type="submit" class="btn btn-secondary btn-sm">Déconnexion</button></form></li></ul></div>')
        <?php } else { ?>
            $('.login').html('<a href="/webapp/public/connexion" type="button" class="btn btn-primary">Se connecter</a>')
        <?php } ?>
        $('img.addPhoto.headerPhoto').attr('src', '<?= !empty($_SESSION['photo']) ? $_SESSION['photo'] : 'assets/img/flower.svg' ?>')
    });
</script>
<script>
    $(document).ready(function() {
        <?php
        if ($_SESSION['isActive'] == 0) { ?>
            $('#isActiveModal').modal('show')
        <?php  }
        ?>
    });
</script>
<script>
    $(document).ready(function() {
        var bigger = 1
        console.log(localStorage.getItem('font-size'))
        console.log($('body').css('font-size'))
        $('body').css('font-size', localStorage.getItem('font-size') + 'em')
        if (localStorage.getItem('href') == null) {
           $('.styleCss').attr('href', 'assets/css/style.css')
        } else {
           $('.styleCss').attr('href', localStorage.getItem('href'))
        }
        if ($('.styleCss').attr('href') == 'assets/css/style.css' ) {
            $('.darkMode').html('Mode nuit')
        } else if ($('.styleCss').attr('href') == 'assets/css/style_dark.css') {
            $('.darkMode').html('Mode jour')
        }
        $('.policePlus').on('click', function() {
            if (bigger <= 1.8 || localStorage.getItem('font-size') <= 1.8) {
                bigger += 0.1
                $('body').css('font-size', bigger + 'em')
                console.log(bigger)
                localStorage.setItem('font-size', bigger)
            }
        })
        $('.policeMoins').on('click', function() {
            if (bigger >= 1.1 || localStorage.getItem('font-size') >= 1.1) {
                bigger -= 0.1
                $('body').css('font-size', bigger + 'em')
                console.log(bigger)
                localStorage.setItem('font-size', bigger)
            }
        })
        $('.darkMode').on('click', function() {
            if ($('.styleCss').attr('href') == 'assets/css/style.css' ) {
                $('.darkMode').html('Mode jour')
                $('.styleCss').attr('href' , 'assets/css/style_dark.css')
                localStorage.setItem('href', 'assets/css/style_dark.css')
            } else if ($('.styleCss').attr('href') == 'assets/css/style_dark.css') {
                $('.darkMode').html('Mode nuit')
                $('.styleCss').attr('href' , 'assets/css/style.css')
                localStorage.setItem('href', 'assets/css/style.css')
            }
        })
    });
</script>
</body>

</html>