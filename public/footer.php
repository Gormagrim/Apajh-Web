<footer class="backgroundFooter mt-4">
    <div class="backgroundContainer1">
        <div class="container-fluid">
            <div class="row text-center clipPath">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <p class="networks mb-0 font-weight-bold">Rejoignez-nous sur les réseaux sociaux !</p>
                </div>
                <div class="col-lg-6">
                    <a class="socialN first" href=""><i class="fab fa-facebook"></i></a>
                    <a class="socialN" href=""><i class="fab fa-facebook-messenger"></i></a>
                    <a class="socialN" href=""><i class="fab fa-instagram"></i></a>
                    <a class="socialN" href=""><i class="fab fa-linkedin"></i></a>
                    <a class="socialN" href=""><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Liens -->
    <div class="container text-center text-lg-left mt-5">
        <div class="row">
            <!-- Liens part1 -->
            <div class="footerPart1 col-md-4 col-lg-4 mx-auto mb-1">
                <p class="title mb-4 text-uppercase font-weight-bold ">À propos de nous</p>
                <ul>
                    <li class="mb-4"><a href="#!">Mentions légales</a></li>
                    <li class="mb-4"><a href="#!">Confidentialité et Cookies</a></li>
                    <li><a href="#!">Conditions générales</a></li>
                </ul>
            </div>
            <!-- Fin des liens part1 -->
            <!-- Liens part2 -->
            <div class="footerPart2 col-md-4 col-lg-4 mx-auto mb-4">
                <p class="title mb-4 text-uppercase font-weight-bold">Aide</p>
                <ul>
                    <li class="mb-4"><a href="#!">F.A.Q</a></li>
                    <li><a href="#!">Aide</a></li>
                </ul>
            </div>
            <!-- Fin des liens part2 -->
            <!-- Liens part3 -->
            <div class="col-md-4 col-lg-4 mx-auto mb-4">
                <p class="title mb-4 text-uppercase font-weight-bold">Contact</p>
                <ul class="contact">
                    <li class="mb-4"><i class="fas fa-home mr-3"></i> Rue Charles Linné, 02100 Saint-Quentin</li>
                    <li class="mb-4"><i class="fas fa-envelope mr-3"></i><a href="mailto:contact@apajhweb.fr"> Nous contacter</a></li>
                    <li><i class="fas fa-phone mr-3"></i><a href="tel:+33323671513"> 03 23 67 15 13</a></li>
                </ul>
            </div>
            <!-- Fin des liens part3 -->
        </div>
    </div>
    <!-- Fin des liens -->
    <!-- Copyright -->
    <div class="footerCopyright text-center py-3">©<?= date('Y') ?> Apajh Web</div>
    <!-- Fin de copyright -->
</footer>
<script language="JavaScript" type="text/javascript" src="assets/js/jquery-3.6.6.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script language="JavaScript" type="text/javascript" src="assets/js/script.js"></script>
<script language="JavaScript" type="text/javascript" src="assets/js/ajax.js"></script>
<?php ($page == '/webapp/public/auditif') ? require '../fetch/likeMatch.php' : '' ?>
<?php ($page == '/webapp/public/auditif-categories' || $page == '/webapp/public/auditif') ? require '../fetch/selectCategory.php' : '' ?>
<?php ($page == '/webapp/public/acount') ? require '../fetch/addUserPhoto.php' : '' ?>
<?php ($page == '/webapp/public/acount') ? require '../fetch/citiesSelect.php' : '' ?>
<?php ($page == '/webapp/public/favoris') ? require '../fetch/selectFavoris.php' : '' ?>
<?php ($page == '/webapp/public/admin') ? require '../fetch/addVideo.php' : '' ?>
<?php ($page == '/webapp/public/admin-word') ? require '../fetch/word.php' : '' ?>
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
            $('.login').html('<div class="btn-group dropstart"><button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><img class="addPhoto headerPhoto" src="" alt=""></button><ul class="dropdown-menu"><li><a class="dropdown-item text-center" href="/webapp/public/acount">Mon compte</a></li><li><a class="dropdown-item text-center" href="/webapp/public/favoris">Mes favoris</a></li><li><a class="dropdown-item text-center" href="#">Mon Apajh</a></li><li><form class="text-center" action="/webapp/public/deconnexion" method="post"><button type="submit" class="btn btn-secondary btn-sm">Déconnexion</button></form></li></ul></div>')
            <?php } else { ?>
            $('.login').html('<a href="/webapp/public/connexion" type="button" class="btn btn-primary">Se connecter</a>')
        <?php } ?>
        $('img.addPhoto.headerPhoto').attr('src', '<?= !empty($_SESSION['photo']) ? $_SESSION['photo'] : 'assets/img/flower.svg' ?>')
    });
</script>

</body>

</html>