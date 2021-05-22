<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <?php
            $router = new AltoRouter();
            $router->map('GET', '/webapp/public/activation-log=[*:log]-cle=[*:cle]', function () {
                require '../views/activation.php';
            });
            $match = $router->match();
            $log = htmlspecialchars(urldecode($match['params']['log']));
            $cle = htmlspecialchars(urldecode($match['params']['cle']));
            ?>
            <input type="hidden" id="mail" name="mail" value="<?= $log ?>" />
            <input type="hidden" id="validationKey" name="validationKey" value="<?= $cle ?>" />
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 connexion text-center activationMessage"></div>
    </div>
</div>
<script>
    $(document).ready(function() {
        const accountActivate = async function(data) {
            try {
                let response = await fetch('http://localhost/apiApajhv0/public/v1/activate', {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(data)
                })
                if (response.ok) {
                    let activate = await response.json()
                    $('.activationMessage').html('<p class="mb-4 pt-2">Votre compte a bien été activé.</p>')
                    $('.activationMessage').append('<p class="pb-2">Vous allez être redirigé vers la page de connexion.</p>')
                    setTimeout(function() {
                        document.location.replace('/webapp/public/connexion');
                    }, 4000);

                    console.log($('#mail').val())
                    console.log($('#validationKey').val())
                } else {
                    console.error('Retour : ', response.status)
                    console.log($('#mail').val())
                    console.log($('#validationKey').val())
                }
            } catch (e) {
                console.log(e)
            }
        }
        accountActivate({
            mail: $('#mail').val(),
            validationKey: $('#validationKey').val()
        })
    });
</script>