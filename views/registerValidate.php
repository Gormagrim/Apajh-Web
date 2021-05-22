<?php
require_once '../controllers/UserController.php'; ?>
    <div class="row">
        <div class="offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 connexion text-center">
            <?php if (empty($formErrors)) { ?>
                <p class="p-2"><?= $success['valid'] ?></p>
            <?php } else { ?>
                <p class="p-2"><?= $success['error'] ?></p>
            <?php } ?>
        </div>
    </div>
