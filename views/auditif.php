<?php
require_once '../controllers/ContentController.php';
$contentController = new ContentController;
?>
<div class="container-fluid">
    <?php if (!isset($_POST['contentTitle'])) { ?>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <h1 class="auditif">Vidéothèque des signes</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <p>Taper un mot si dessous pour le rechercher.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 connexion">
                <div class="row">
                    <div class="col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 offset-xl-2 col-xl-8 formConnexion">
                        <form class="d-flex" action="/webapp/public/auditif" method="POST">
                            <input class="form-control me-2" type="search" name="contentTitle" placeholder="Taper un mot ici" aria-label="Search">
                            <button class="btn btn-primary" type="submit">Rechercher</button>
                            <?php if (isset($formErrors['search'])) { ?>
                                <div class="invalid-feedback">
                                    <p><?= $formErrors['search'] ?></p>
                                </div>
                            <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <h2 class="h2cat">OU</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <h2 class="h2cat"><a href="/webapp/public/auditif-categories">accéder aux catégories</a></h2>
            </div>
        </div>
        <?php } elseif (isset($_POST['contentTitle'])) {
        $countResult = count($video);
        if ($countResult === 0) { ?>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center search">
                    <h3>Nous n'avons trouvé aucune vidéo concernant le mot :</h3>
                    <h4>"<?= $_POST['contentTitle'] ?>"</h4>
                </div>
            </div>
        <?php } else if ($countResult === 1) { ?>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center search">
                    <h3><?= $countResult ?> vidéo trouvée pour votre recherche du mot :</h3>
                    <h4>"<?= $_POST['contentTitle'] ?>"</h4>
                </div>
            </div>
            <?php foreach ($video as $word) { ?>
                <div class="row">
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
                    <div class="col-12 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 connexion videoss text-center">
                        <?php if (isset($word->video)) {
                            $videoLds = $contentController->getVideoLds($word->video[0]->fileName);
                        }
                        $countLike = count($word->like);
                        if (!empty($_SESSION['id'])) {
                            foreach ($word->like as $like) {
                                $likes =  $_SESSION['id'];
                                if (!empty($like)) {
                                    if ($like->id_users == $likes) {
                                        $isLike = 1;
                                    }
                                }
                            }
                        }
                        ?>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 video text-center">
                                <div class="ratio ratio-16x9">
                                    <video id="ldsVideo" class="ldsVideo" contextmenu="return false;" oncontextmenu="return false;" controls muted autoplay loop>
                                        <source src="<?= $videoLds ?>" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <div class="title">
                                    <h2 class="wordTitle"><?= $word->contentTitle ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                                <span class="category">catégorie: <?= $word->category[0]->category ?></span>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                                <i class="<?= isset($isLike) && $isLike == 1 ? 'fas' : 'far' ?> fa-heart <?= isset($isLike) && $isLike == 1 ? 'like' : 'notLike' ?>" data-isLike="<?= $isLike ?>"></i>
                                <span class="badge <?= isset($isLike) && $isLike == 1 ? 'like' : 'notLike' ?>" id="like_<?= $word->id ?>" data-like="<?= $countLike ?>"><?= $countLike  ?> <?= $countLike > 1 ? 'personnes aiment' : 'personne aime' ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <p class="wordText"><?= $word->video[0]->videoText ?></p>
                            </div>
                        </div>
                        <div class="row socialM">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <input type="hidden" name="contentLike" value="<?= $word->id ?>">
                                <input class="hiddenCount" type="hidden" value="<?= $countLike ?>">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                                <i title="<?= isset($isLike) && $isLike == 1 ? 'Clique pour ne plus aimer :(' : 'Clique pour aimer ! :)' ?>" type="submit" class="<?= isset($isLike) && $isLike == 1 ? 'fas' : 'far' ?> fa-thumbs-up fa-2x articleLike <?= isset($isLike) && $isLike == 1 ? 'like' : 'notLike' ?>" data-like="<?= $word->id ?>" data-isLike="<?= isset($isLike) ? $isLike : 0 ?>"></i>
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
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                        <a href="/webapp/public/auditif" class="btn btn-primary otherWord">Rechercher un autre mot</a>
                    </div>
                </div>
            <?php } // fin de foreach (video as word)
        } else if ($countResult > 1 && $countResult < 6) { ?>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center search">
                    <h3><?= $countResult ?> vidéos trouvées pour le mot :</h3>
                    <h4>"<?= $_POST['contentTitle'] ?>"</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-2 offset-md-1 col-md-2 offset-lg-1 col-lg-2 offset-xl-1 col-xl-2 text-center wordListDiv">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center search">
                            <p>Clique sur l'un des mots pour afficher ta vidéo.</p>
                        </div>
                    </div>
                    <?php foreach ($video as $word) {
                        if (isset($word->video)) {
                            $videoLds = $contentController->getVideoLds($word->video[0]->fileName);
                        }
                        $countLike = count($word->like); ?>
                        <div class="wordListLi connexion" data-isLike="" data-id="<?= $word->id ?>" data-contentTitle="<?= $word->contentTitle ?>" data-videoText="<?= $word->video[0]->videoText ?>" data-src="<?= $videoLds ?>" data-like="<?= $countLike ?>">
                            <span class="wordList" data-isLike=""><?= $word->contentTitle ?></span>
                            <hr />
                            <span class="category"><?= $word->category[0]->category ?></span>
                        </div>
                    <?php  } ?>
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
                                        <source src="<?= $videoLds ?>" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <div class="title">
                                    <h2 class="wordTitle"><?= $word->contentTitle ?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                                <span class="category">catégorie: <?= $word->category[0]->category ?></span>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                                <i class="far fa-heart notLiked" data-isLike=""></i>
                                <span class="badge notLike" id="like_<?= $word->id ?>" data-like="<?= $countLike ?>"><?= $countLike  ?> <?= $countLike > 1 ? 'personnes aiment' : 'personne aime' ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <p class="wordText"><?= $word->video[0]->videoText ?></p>
                            </div>
                        </div>
                        <div class="row socialM">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <input type="hidden" name="contentLike" value="<?= $word->id ?>">
                                <input class="hiddenCount" type="hidden" value="<?= $countLike ?>">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6 text-center">
                                <i title="" type="submit" class="far fa-thumbs-up fa-2x articleLike notLiked" data-like="<?= $word->id ?>" data-isLike=""></i>
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
        <?php
        } else if ($countResult > 6) { ?>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center search">
                    <h3><?= $countResult ?> vidéos trouvées pour le mot :</h3>
                    <h4>"<?= $_POST['contentTitle'] ?>"</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-2 offset-md-1 col-md-2 offset-lg-1 col-lg-2 offset-xl-1 col-xl-2 text-center selectCat">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <p>Sélectionne l'un des <?= $countResult ?> mots</p>
                        </div>
                    </div>
                    <div class="catItem col-12 text-center">
                        <select class="catWord" name="Category">
                            <option value="">--Sélectionne ton mot--</option>
                            <?php
                            foreach ($video as $word) { ?>
                                <option value="<?= $word->id ?>" data-catId="<?= $word->id ?>"><?= $word->contentTitle ?></option>
                            <?php
                            } ?>
                        </select>
                        <input class="hiddenFileName" type="hidden" data-fileName="" value="">
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
    <?php   } // fin du else if countResult
    } ?>

</div> <!-- fin du container_fluid -->