<?php
require_once '../controllers/ContentController.php';
$contentController = new ContentController;
?>
<div class="container-fuid">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <img class="img-fluid pageSignes" src="./assets/img/page-blog.png" alt="Logo de la page de la langue des signes de l'Apajh à SAINT-QUENTIN">
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
            <h1 class="blog">Liste de tous les articles du blog</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
            <h2 class="lastArticle">Tous les articles</h2>
        </div>
    </div>
    <!-- DEBUT DES ARTICLES -->
    <?php foreach ($blogArticle as $article) { ?>
        <div class="row">
            <div class="offset-1 col-10 text-center">

                <?php if (isset($article->photo)) {
                    $photoB = $contentController->getPhoto($article->photo[0]->fileName);
                } ?>
                <div class="row oneArticle">
                    <?php if ($article->id_contentType == 1) { ?>
                        <div class="col-12 ime"><i class="fas fa-child"></i> IME</div>
                    <?php } ?>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                        <img class="allArticlePhoto img-fluid" src="<?= $photoB ?>" alt="<?= $article->photo[0]->photoText ?>">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 articleText">
                        <h3 class="articleTitle"><?= $article->contentTitle ?></h3>
                        <?php setlocale(LC_TIME, "fr_FR", "French"); ?>
                        <p class="sign">Écrit le <span class="date"><?= strftime("%A %d %B %G", strtotime($article->contentDate)) ?></span> par <span class="autor"><?= $article->user_description->firstname . ' ' . mb_strtoupper($article->user_description->lastname) ?></span>.</p>
                        <p><?= substr($article->paragraph[0]->text, 0, 200) ?>...</p>
                        <a href="/webapp/public/blog-<?= $article->id . '-' . str_replace('\'', '', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', str_replace(' ', '-', $article->contentTitle)))) ?>" class="btn btn-info plus" data-id="<?= $article->id ?>">Voir plus</a>
                        <div class="like">
                            <div class="coeur text-center">
                                <i class="fas fa-heart fa-2x"></i>
                            </div>
                            <div class="nb text-center">
                                <span class="badge bg-secondary like"><?= number_format(count($article->like), 0, ',', ' '); ?></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    <?php } ?>
</div>