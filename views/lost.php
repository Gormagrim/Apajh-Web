<div class="container-fluid">
    <?php if (empty($_POST['mail'])) { ?>
        <div class="row">
            <div class="offset-1 col-10 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 connexion">
                <div class="row">
                    <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 formConnexion">
                        <form action="/webapp/public/mot-de-passe-perdu" method="POST">
                            <div class="form-group">
                                <label for="mail" class="form-label">Merci de saisir votre adresse mail</label>
                                <input type="mail" class="form-control" id="mail" name="mail" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" placeholder="votre-adresse@e-mail.fr" />
                                <div class="feedback">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary connexionButton">Valider</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="offset-1 col-10 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 connexion">
                    <p>Un mail de confirmation a été envoyé sur l'adresse mail que vous venez de saisir. Merci de cliquer sur le lien présent dans ce mail.</p>
            </div>
        </div>
    <?php }
    ?>

</div>
<script>
    $('#mail').on('keyup', function() {
        const checkMail = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/checkMail', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    let responseCheckMail = await response.json()
                    if (responseCheckMail.message == 0) {
                        $('.feedback').html('<p class="invalidity">Ce mail n\'est pas connu de notre site</p>')
                        $('.form-control').addClass('is-invalid')
                        $('.form-control').removeClass('is-valid')
                    } else {
                        $('.feedback').html('<p></p>')
                        $('.form-control').removeClass('is-invalid')
                        $('.form-control').addClass('is-valid')
                    }
                } else {
                    console.error('Retour : ', response.status)
                }
            } catch (e) {
                console.log(e)
            }
        }
        checkMail({
            mail: $('#mail').val()
        })
    });
</script>