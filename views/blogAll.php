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
            <h2 class="lastArticle">Les derniers articles</h2>
        </div>
    </div>
    <!-- DEBUT DES ARTICLES -->
    <?php foreach ($blogArticle as $article) {
        if (isset($article->photo)) {
            $photoB = $contentController->getPhoto($article->photo[0]->fileName);
        } ?>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 oneArticle">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 text-center">
                        <img class="ArticlePhoto img-fluid" src="<?= $photoB ?>" alt="<?= $article->photo[0]->photoText ?>">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-8 articleText">
                        <h3 class="articleTitle"><?= $article->contentTitle ?></h3>
                        <?php setlocale(LC_TIME, "fr_FR", "French"); ?>
                        <p class="sign">Écrit le <span class="date"><?= strftime("%A %d %B %G", strtotime($article->contentDate)) ?></span> par <span class="autor"><?= $article->user_description->firstname . ' ' . mb_strtoupper($article->user_description->lastname) ?></span>.</p>
                        <p><?= substr($article->paragraph[0]->text, 0, 250) ?>...</p>
                        <a href="/webapp/public/blog-<?= $article->id . '-' . str_replace('\'', '', strtolower(iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', str_replace(' ', '-', $article->contentTitle)))) ?>" class="btn btn-info plus" data-id="<?= $article->id ?>">Voir plus</a>
                        <button type="button" class="btn btn-primary like">
                            Like <span class="badge bg-secondary"><?= count($article->like) ?></span>
                        </button>
                        <!-- <i class="fas fa-heart fa-2x like"></i> -->
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>