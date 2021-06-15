<?php
require_once '../controllers/ContentController.php';
$contentController = new ContentController;
?>
<div class="container-fuid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <img class="img-fluid pageSignes" src="./assets/img/page-blog2.png" alt="Logo de la page de la langue des signes de l'Apajh à SAINT-QUENTIN">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <h1 class="blog">Bienvenue sur le blog de l'IME / SESSAD la FEUILLAUME de SAINT-QUENTIN</h1>
        </div>
    </div>
    <div clas="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="row">
                <div class="col-12 col-sm-9 col-md-9 col-lg-9 col-xl-9">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                            <h2 class="lastArticle">Les derniers articles</h2>
                        </div>
                    </div>
                    <?php
                    if (empty($_SESSION['token'])) { ?>
                        <div clas="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                <h3 class="bleu">Vous devez vous connecter pour voir le contenu du blog.</h3>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <!-- DEBUT DES ARTICLES -->
                    <?php foreach ($blogArticle as $article) {
                        if (isset($article->photo)) {
                            $photoB = $contentController->getPhoto($article->photo[0]->fileName);
                        } ?>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 oneArticle">
                                <div class="row">
                                    <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                                        <img class="ArticlePhoto img-fluid" src="<?= $photoB ?>" alt="<?= $article->photo[0]->photoText ?>">
                                    </div>
                                    <div class="col-12 col-sm-8 col-md-8 col-lg-8 col-xl-8 articleText">
                                        <h3 class="articleTitle text-center"><?= $article->contentTitle ?></h3>
                                        <?php setlocale(LC_TIME, "fr_FR", "French"); ?>
                                        <p class="sign">Écrit le <span class="date"><?= strftime("%A %d %B %G", strtotime($article->contentDate)) ?></span> par <span class="autor"><?= $article->user_description->firstname . ' ' . mb_strtoupper($article->user_description->lastname) ?></span>.</p>
                                        <p class="firstPara"><?= substr($article->paragraph[0]->text, 0, 250) ?>...</p>
                                        <a href="/webapp/public/blog-<?= $article->id . '-' . str_replace('\'', '', str_replace('@', 'a', str_replace('^', '', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', str_replace(' ', '-', $article->contentTitle)))))) ?>" class="btn btn-info plus mt-2 mb-2" data-id="<?= $article->id ?>">Voir plus</a>
                                        <button type="button" class="btn btn-primary like mt-2 mb-2">
                                            Like <span class="badge bg-secondary"><?= count($article->like) ?></span>
                                        </button>
                                        <!-- <i class="fas fa-heart fa-2x like"></i> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }
                    if (!empty($_SESSION['token'])) { ?>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-4 text-center">
                            <a href="/webapp/public/blog-tous-les-articles" class="btn btn-info allArticle" data-id="<?= $article->id ?>">Voir tous les articles</a>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- FIN D'UN ARTICLE -->
                </div> <!-- FIN DES ARTICLES -->
                <div class="col-12 col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <h2 class="lastArticle">Notre équipe</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 somePro">
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>