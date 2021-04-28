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
            <p class="favorisV">Vos favoris comportent <?= count($likeVideo) ?> vidéos.</p>
        </div>
    </div>
    <div class="row">
        <div class="offset-1 col-10 offset-sm-1 col-sm-1 offset-md-1 col-md-1 offset-lg-1 col-lg-1 offset-xl-1 col-xl-1">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <div class="connexion favoris">
                        <span>Articles</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <div class="connexion favoris ldsfVideo">
                        <span>Vidéos LSF</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="offset-1 col-10 offset-sm-1 col-sm-1 offset-md-1 col-md-1 offset-lg-1 col-lg-1 offset-xl-1 col-xl-1 mt-5">
            <div class="row">
                <div class="col-12 text-center">
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
                </div>
                <div class="col-12 text-center">
                    <select class="favoritSelectWord">
                    </select>
                </div>
            </div>

        </div>
        <div class="offset-1 col-10 offset-sm-2 col-sm-4 offset-md-2 col-md-4 offset-lg-2 col-lg-4 offset-xl-2 col-xl-4 text-center videoDiv">
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