<?php
require_once '../controllers/ContentController.php';
$contentController = new ContentController;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <h1 class="auditif-cat">Vidéothèque des signes</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 offset-sm-1 col-sm-2 offset-md-1 col-md-2 offset-lg-1 col-lg-2 offset-xl-1 col-xl-2 text-center selectCat">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <h2>Les catégories</h2>
                </div>
            </div>
            <div class="catItem col-12 text-center">
                <select class="catItem" name="Category">
                    <option value="">--Choisis une catégorie--</option>
                    <?php
                    foreach ($category as $cat) { ?>
                        <option value="<?= $cat->id ?>" data-catId="<?= $cat->id ?>"><?= $cat->category ?></option>
                    <?php
                    } ?>
                </select>
                <input class="hiddenFileName" type="hidden" data-fileName="" value="">
            </div>
            <div class="col-12 text-center">
                <select class="catWord" name="catWord" id="catWord">
                </select>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <a href="/webapp/public/auditif" class="btn btn-primary otherWord">Autre recherche</a>
                </div>
            </div>
        </div>
        <div class="col-12 offset-sm-2 col-sm-5 offset-md-2 col-md-5 offset-lg-2 col-lg-5 offset-xl-2 col-xl-5 text-center videoDiv" id="video_">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center speed">
                <div class="dropdown text-center">
                    <button class="btn btn-secondary speedBtn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Vitesse de lecture
                    </button>
                    <ul class="dropdown-menu col-1" aria-labelledby="dropdownMenuButton1">
                        <li class="dropdown-item speed_25" href="#">25%</li>
                        <li class="dropdown-item speed_50" href="#">50%</li>
                        <li class="dropdown-item speed_75" href="#">75%</li>
                        <li class="dropdown-item speed_100" href="#">100%</li>
                    </ul>
                </div>
            </div>
            <div class="wordDiv connexion videoss">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 video text-center">
                        <div class="ratio ratio-16x9">
                            <video id="ldsVideo" class="ldsVideo" contextmenu="return false;" oncontextmenu="return false;" controls muted autoplay loop>
                            </video>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <div class="title">
                            <h2 class="wordTitle"></h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                        <span class="category cat">catégorie: </span>
                    </div>
                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                        <input type="hidden" class="badgehidden" value="">
                        <i class="far fa-heart" data-isLike=""></i>
                        <span class="badge" id="" data-like=""></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <p class="wordText"></p>
                    </div>
                </div>
                <div class="row socialM">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <input type="hidden" name="contentLike" class="contentLike" value="">
                        <input class="hiddenCount" type="hidden" value="">
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                        <i title="" type="submit" class="far fa-thumbs-up fa-2x articleLike " data-like="" data-isLike=""></i>
                        <span class="category">J'aime</span>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <p class="category">Vous aimez cette vidéo ? Partagez la !</p>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <a class="socialN first" href=""><i class="fab fa-facebook"></i></a>
                                <a class="socialN" href=""><i class="fab fa-facebook-messenger"></i></a>
                                <a class="socialN" href=""><i class="fab fa-instagram"></i></a>
                                <a class="socialN" href=""><i class="fab fa-linkedin"></i></a>
                                <a class="socialN" href=""><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>