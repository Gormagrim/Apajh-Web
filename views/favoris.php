<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <img class="img-fluid pageSignes" src="./assets/img/ma-page.png" alt="Logo de ma page sur le site de l'Apajh à SAINT-QUENTIN">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 h1compte text-center mt-4">
            <h1>Mes favoris</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 h1compte text-center mt-4">
            <p>A chaque fois que vous aimez un article ou une vidéo, elle est enregistrée dans vos favoris.</p>
            <p>Vous pouvez ainsi facilement les retrouver ici !</p>
            <p class="favorisV">Vos favoris comportent <span class="bleu"><?= count($likeVideo) ?></span> vidéos.</p>
            <p class="favorisB"></p>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
            <span class="favoris blogArticle connexion p-2">Articles</span>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
            <span class="favoris ldsfVideo connexion p-2">Vidéos LSF</span>
        </div>
    </div>
    <div class="allVideos">
        <div class="row">
            <div class=" offset-1 col-10 col-sm-3 col-md-3 col-lg-3 col-xl-3 mt-5">

                <select class="favoritSelect" name="testFavoris">
                    <option value="">--Choisis une catégorie--</option>
                    <?php
                    $arr = [];
                    foreach ($likeVideo as $like) {
                        $arr[] = $like->category;
                    };
                    $catList = array_unique($arr);
                    foreach ($catList as $cat) { ?>
                        <option value="<?= $cat ?>"><?= $cat ?></option>
                    <?php
                    } ?>
                </select>
                <input class="hiddenFileName" type="hidden" data-fileName="" value="">

                <select class="favoritSelectWord">
                </select>

            </div>
            <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center videoDiv">
                <div class="wordDiv connexion videoss">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <div class="title">
                                <h2 class="wordTitle"></h2>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <span class="category cat">catégorie: </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <p class="wordText"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 video text-center">
                            <div class="ratio ratio-16x9">
                                <video id="ldsVideo" class="ldsVideo" contextmenu="return false;" oncontextmenu="return false;" controls muted autoplay loop>
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="row socialM">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <input type="hidden" name="contentLike" class="contentLike" value="">
                            <input class="hiddenCount" type="hidden" value="">
                        </div>
                        <div class="row">
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
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center speed">
                        <div class="dropdown text-center">
                            <button class="btn btn-secondary speedBtn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="lievre" src="assets/img/lievre-blanc.png" alt="vitesse du lièvre"> x2
                            </button>
                            <ul class="dropdown-menu speedy col-1" aria-labelledby="dropdownMenuButton1">
                                <li class="dropdown-item speed_25" href="#"><img class="tortue" src="assets/img/tortue-blanche.png" alt="vitesse de la tortue"> x2</li>
                                <li class="dropdown-item speed_50" href="#"><img class="tortue" src="assets/img/tortue-blanche.png" alt="vitesse de la tortue"></li>
                                <li class="dropdown-item speed_75" href="#"><img class="lievre" src="assets/img/lievre-blanc.png" alt="vitesse du lièvre"></li>
                                <li class="dropdown-item speed_100" href="#"><img class="lievre" src="assets/img/lievre-blanc.png" alt="vitesse du lièvre"> x2</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row allBlogArticle">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="favoriteArticle text-center">
            </div>
        </div>
    </div>
</div>