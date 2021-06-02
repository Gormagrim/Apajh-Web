<?php
require_once '../controllers/ContentController.php';
$contentController = new ContentController;
?>
<div class="container-fluid">
    <div clas="row">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <img class="img-fluid pageSignes" src="./assets/img/page-blog2.png" alt="Logo de la page de la langue des signes de l'Apajh à SAINT-QUENTIN">
            </div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="row">
                <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                    <!-- DEBUT DES ARTICLES -->
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center mt-4 mb-4">
                            <h1 class="articleContent"><?= $articleId->contentTitle ?></h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <?php if (isset($articleId->photo)) {
                                $photoB = $contentController->getPhoto($articleId->photo[0]->fileName);
                            } ?>
                            <img class="mainImg img-fluid" src="<?= $photoB ?>" alt="<?= $articleId->photo[0]->photoText ?>">
                            <p class="smallText"><?= $articleId->photo[0]->photoText ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 text-center chapo mb-4 articleContent">
                            <h2><?= $articleId->paragraph[0]->text ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10">
                            <?php setlocale(LC_TIME, "fr_FR", "French"); ?>
                            <p class="sign">Écrit le <span class="date"><?= strftime("%A %d %B %G", strtotime($articleId->contentDate)) ?></span> par <span class="autor"><?= $articleId->user_description->firstname . ' ' . mb_strtoupper($articleId->user_description->lastname) ?></span>. Cet article à été lu <span class="autor"><?= number_format($articleId->view[0]->viewNumber, 0, ',', ' ') ?></span> fois.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10">
                            <button type="button" class="btn btn-primary articleLike">
                                Like <span class="badge bg-secondary" data-count="<?= count($articleId->like) ?>"></span>
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 text-center">
                            <p>Vous aimez cet article ? Partagez le !</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 text-center mb-4">
                            <a class="socialN first" href=""><i class="fab fa-facebook blog fa-2x"></i></a>
                            <a class="socialN" href=""><i class="fab fa-facebook-messenger blog fa-2x"></i></a>
                            <a class="socialN" href=""><i class="fab fa-instagram blog fa-2x"></i></a>
                            <a class="socialN" href=""><i class="fab fa-linkedin blog fa-2x"></i></a>
                            <a class="socialN" href=""><i class="fab fa-twitter blog fa-2x"></i></a>
                        </div>
                    </div>

                    <?php
                    foreach ($articleId->paragraph as $article) { ?>
                        <div class="row">
                            <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 text-center articleContent">
                                <?php if (!empty($article->title)) { ?>
                                    <h3><?= $article->title ?></h3>
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                        if (!empty($articleId->paragraph_photos) && $articleId->paragraph_photos[0]->id_paragraph == $article->id) {
                            $photoP = $contentController->getPhoto($articleId->paragraph_photos[0]->fileName);
                        ?>
                            <div class="row semiParent">
                                <div class="offset-1 col-10 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5 offset-xl-1 col-xl-5 text-center">
                                    <img class="semiImg img-fluid" src="<?= $photoP ?>" alt="<?= $articleId->paragraph_photos[0]->photoTitle ?>">
                                    <p class="smallText articleContent"><?= $articleId->paragraph_photos[0]->photoTitle ?></p>
                                </div>
                                <div class="offset-1 col-10 col-sm-5 col-md-5 col-lg-5 col-xl-5 text-center paragraphe semi justify-content-center articleContent">
                                    <p><?= $article->text ?></p>
                                </div>
                            </div>
                            <?php  } else {
                            if ($article->text != $articleId->paragraph[0]->text) { ?>
                                <div class="row">
                                    <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 paragraphe text-center articleContent">
                                        <p><?= $article->text ?></p>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    <?php } ?>
                    <div class="row">
                        <div class="offset-1 col-10 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6 offset-xl-3 col-xl-6 text-center mb-4">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <?php $photoD = $contentController->getPhoto($articleId->photo[0]->fileName); ?>
                                        <img src="<?= $photoD ?>" class="d-block w-100" alt="<?= $articleId->photo[0]->photoTitle ?>" title="<?= $articleId->photo[0]->photoTitle ?>">
                                    </div>
                                    <?php
                                    foreach ($articleId->photo as $photo) {
                                        $photoC = $contentController->getPhoto($photo->fileName);
                                    ?>
                                        <div class="carousel-item">
                                            <img src="<?= $photoC ?>" class="d-block w-100" alt="<?= $photo->photoTitle ?>" title="<?= $photo->photoTitle ?>">
                                        </div>
                                    <?php } ?>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10">
                            <p>Vous aimez cet article ? N'hésitez pas à le liker.</p><button type="button" class="btn btn-primary articleLike">
                                Like <span class="badge bg-secondary" data-count="<?= count($articleId->like) ?>"></span>
                            </button>
                        </div>
                    </div>
                    <?php
                    if (!empty($_SESSION['id'])) {
                        foreach ($articleId->like as $like) {
                            $id = $_SESSION['id'];
                            if (!empty($like)) {
                                if ($like->id_users == $id) {
                                    $isLike = 1;
                                } else {
                                    $isLike = 0;
                                }
                            } else {
                                $isLike = 0;
                            }
                        }
                    }
                    ?>
                    <div class="likeItem blogLike">
                        <i title="" type="submit" class="far fa-thumbs-up fa-2x articleBlogLike" data-like="" data-isLike="<?= isset($isLike) ? $isLike : 0 ?>" data-id="<?= $articleId->id ?>" title="J'aime !"></i>
                    </div>
                    <script>
                        // pour liker un article du blog
                        $('.articleBlogLike').on('click', function() {
                            var isLike = $('.articleBlogLike').attr('data-isLike');
                            if (isLike == 1) {
                                var like = $('.badge').attr('data-count')
                                like--
                                $('.badge').html(like)
                                const articleLike = async function(data) {
                                    try {
                                        let response = await fetch('http://localhost/apiApajhv0/public/v1/like', {
                                            method: 'DELETE',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                                            },
                                            body: JSON.stringify(data)
                                        })
                                        if (response.ok) {
                                            let responseVideoview = await response.json()
                                        } else {
                                            console.error('Retour : ', response.status)
                                        }
                                    } catch (e) {
                                        console.log(e)
                                    }
                                }
                                articleLike({
                                    id_content: $(this).attr('data-id')
                                })
                            } else {
                                var like = $('.badge').attr('data-count')
                                $('.badge').html(like)
                                const articleLike = async function(data) {
                                    try {
                                        let response = await fetch('http://localhost/apiApajhv0/public/v1/like', {
                                            method: 'POST',
                                            headers: {
                                                'Content-Type': 'application/json',
                                                'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                                            },
                                            body: JSON.stringify(data)
                                        })
                                        if (response.ok) {
                                            let responseVideoview = await response.json()
                                        } else {
                                            console.error('Retour : ', response.status)
                                        }
                                    } catch (e) {
                                        console.log(e)
                                    }
                                }
                                articleLike({
                                    id_content: $(this).attr('data-id')
                                })
                            }
                        })
                    </script>
                    <!-- FIN D'UN ARTICLE -->
                </div>
                <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <h2 class="lastArticle">Derniers articles</h2>
                        </div>
                    </div>
                    <script>
                        // Mini arcticles côté droit
                        $(document).ready(function() {
                            const getArticle = async function(data) {
                                try {
                                    let response = await fetch('http://localhost/apiApajhv0/public/v1/article', {
                                        method: 'GET',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                                        }
                                    })
                                    if (response.ok) {
                                        let responseGetArticle = await response.json()
                                        var id = $('.articleBlogLike').attr('data-id')
                                        for (var resp in responseGetArticle) {
                                            if (responseGetArticle[resp].id != id) {
                                                var fileName = responseGetArticle[resp].photo[0].fileName
                                                var articleName = responseGetArticle[resp].contentTitle
                                                var articleConca = articleName.replace(/ /g, '-')
                                                var articleConcaAp = articleConca.replace(/\'/gi, '')
                                                var articleConcaApé = articleConcaAp.replace(/é|è|ê/gi, 'e')
                                                var articleConcaApéà = articleConcaApé.replace(/á|à|ã|â|@/gi, 'a')
                                                var articleConcaApéàî = articleConcaApéà.replace(/í|ì|î/gi, 'i')
                                                var articleConcaApéàîô = articleConcaApéàî.replace(/õ|ó|ò|ô/gi, 'o')
                                                var articleConcaApéàîôû = articleConcaApéàîô.replace(/ú|ù|û/gi, 'u')
                                                var articleConcaApéàîôûa = articleConcaApéàîô.replace(/^/gi, '')
                                                var articleUrl = articleConcaApéàîôûa.toLowerCase()
                                                var article = '<div class="row"><div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 oneArticle"><div class="row"><div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10"><img class="smallPicture articlesmallPicture img-fluid" src="http://localhost/apiApajhv0/public/upload/blog/photos/' + fileName + '" alt="' + responseGetArticle[resp].photo[0].photoTitle + '"></div></div><div class="row"><div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10"><h4>' + responseGetArticle[resp].contentTitle + '</h4></div></div><div class="row"><div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10"><p>' + responseGetArticle[resp].paragraph[0].text.substr(0, 150) + '...</p></div></div><div class="row"><div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 offset-xl-1 col-xl-10 mb-2"><a href="/webapp/public/blog-' + responseGetArticle[resp].id + '-' + articleUrl + '" class="btn btn-info plusSmall">Voir plus</a> </div></div></div></div>'
                                                $('.SomeArticle').append(article)
                                            }
                                        }
                                    } else {
                                        console.error('Retour : ', response.status)
                                    }
                                } catch (e) {
                                    console.log(e)
                                }
                            }
                            getArticle()
                        });
                    </script>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 SomeArticle">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                            <h2 class="lastArticle">Notre équipe</h2>
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            const getProUsers = async function(data) {
                                try {
                                    let response = await fetch('http://localhost/apiApajhv0/public/v1/proUsers', {
                                        method: 'GET',
                                        headers: {
                                            'Content-Type': 'application/json',
                                            'Authorization': 'Bearer <?php echo $_SESSION['token']; ?>'
                                        }
                                    })
                                    if (response.ok) {
                                        let responseGetUser = await response.json()
                                        for (var resp in responseGetUser) {
                                            var src = responseGetUser[resp].user_photo == null ? 'assets/img/flower2.png' : 'http://localhost/apiApajhv0/public/upload/user/' + responseGetUser[resp].user_photo.fileName
                                            var pro = '<div class="row ourTeam"><div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 text-center"><img class="team" src="' + src + '" alt="Fleur de l\'Apajh" class="img-thumbnail"></div><div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 teamName text-center"><span>' + responseGetUser[resp].user_description.firstname + ' ' + responseGetUser[resp].user_description.lastname.toUpperCase() + '</span><br /><span class="job">' + responseGetUser[resp].user_description.job + '</span></div></div>'
                                            $('.somePro').append(pro)
                                        }
                                    } else {
                                        console.error('Retour : ', response.status)
                                    }
                                } catch (e) {
                                    console.log(e)
                                }
                            }
                            getProUsers()
                        });
                    </script>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 somePro">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>