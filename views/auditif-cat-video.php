<?php
require_once '../controllers/ContentController.php';
$contentController = new ContentController;
?>
<div class="container-fluid">
     <div class="col-12 offset-sm-1 col-sm-2 offset-md-1 col-md-2 offset-lg-1 col-lg-2 offset-xl-1 col-xl-2 text-center wordListDiv">
        <?php
        foreach ($video as $cat) {
            echo $cat->id;
          } ?>

    </div>
</div>