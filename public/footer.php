<script language="JavaScript" type="text/javascript" src="assets/js/jquery-3.6.6.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
<script language="JavaScript" type="text/javascript" src="assets/js/script.js"></script>
<script language="JavaScript" type="text/javascript" src="assets/js/ajax.js"></script>
<?php ($page == '/webapp/public/auditif') ? require '../fetch/likeMatch.php' : '' ?>
<?php ($page == '/webapp/public/auditif-categories' || $page == '/webapp/public/auditif') ? require '../fetch/selectCategory.php' : '' ?>
<?php ($page == '/webapp/public/acount') ? require '../fetch/addUserPhoto.php' : '' ?>
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
    });
</script>
<footer>
    <div class="row text-center footer">
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <a href="#">Conditions générales d'utilisation</a>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <a href="#">Politique de confidentialité</a>
        </div>
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4">
            <a href="#">Mentions légales</a>
        </div>
    </div>
</footer>

</body>

</html>