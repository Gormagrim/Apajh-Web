<?php
require '../vendor/autoload.php';
require '../controllers/UserController.php';
require '../controllers/ContentController.php';
require '../controllers/LikeController.php';
require '../controllers/LikeMatchController.php';
$router = new AltoRouter();

try {
    $router->map('GET', '/webapp/public/', function () {
        require '../views/home.php';
    });
    $router->map('GET', '/webapp/public/register', function () {
        require '../views/register.php';
    });
    $router->map('POST', '/webapp/public/register', 'UserController#register');
    $router->map('POST', '/webapp/public/connexion', 'UserController#login');
    $router->map('GET', '/webapp/public/connexion', function () {
        require '../views/connexion.php';
    });
    $router->map('GET', '/webapp/public/mon-compte', 'UserController#getUserDescription');
    $router->map('POST', '/webapp/public/mon-compte', 'UserController#descriptionUpdate');

    $router->map('GET', '/webapp/public/favoris', 'ContentController#getVideosByLike');

    $router->map('GET', '/webapp/public/password', function () {
        require '../views/passwordModification.php';
    });
    $router->map('POST', '/webapp/public/password', 'UserController#passwordModification');

    $router->map('POST', '/webapp/public/auditif', 'ContentController#searchVideo');
    $router->map('GET', '/webapp/public/auditif', function () {
        require '../views/auditif.php';
    });
    $router->map('POST', '/webapp/public/auditif-like', 'LikeController#like');

    $router->map('GET', '/webapp/public/auditif-categories', 'ContentController#getCategory');

    $router->map('GET', '/webapp/public/admin', 'ContentController#getCategory');
    $router->map('GET', '/webapp/public/admin', function () {
        require '../views/videosLdfAdmin.php';
    });

    $router->map('GET', '/webapp/public/jeu-auditif', function () {
        require '../views/jeu-auditif.php';
    });

    $router->map('GET', '/webapp/public/memory', function () {
        require '../views/memory.php';
    });

    $router->map('GET', '/webapp/public/divers', function () {
        require '../views/divers.php';
    });

    $router->map('GET', '/webapp/public/jeux-educatifs', function () {
        require '../views/games.php';
    });

    $router->map('GET', '/webapp/public/compter-deposer', function () {
        require '../views/glisser.php';
    });

    $router->map('GET', '/webapp/public/admin-word', function () {
        require '../views/admin-word.php';
    });

    $router->map('POST', '/webapp/public/deconnexion', 'UserController#logout');

    $router->map('GET', '/webapp/public/qui-sommes-nous', function () {
        require '../views/us.php';
    });
    $router->map('POST', '/webapp/public/activation-log=[*:log]-cle=[*:cle]', 'UserController#activate');
    $router->map('GET', '/webapp/public/activation-log=[*:log]-cle=[*:cle]', function () {
        require '../views/activation.php';
    });
    // BLOG
    $router->map('GET', '/webapp/public/blog', 'ContentController#getBlogArticleForBlogIndex');
    $router->map('GET', '/webapp/public/blog', function () {
        require '../views/blogIndex.php';
    });
    $router->map('GET', '/webapp/public/blog-[i:id]-[*:format]?', 'ContentController#getBlogArticleById');
    $router->map('GET', '/webapp/public/header.php', 'ContentController#getBlogArticleById');

    $router->map('GET', '/views/tests', 'ContentController#getBlogArticleById');
    $router->map('GET', '/webapp/public/tests', function () {
        require '../views/tests.php';
    });

    $router->map('GET', '/webapp/public/blog-tous-les-articles', 'ContentController#getBlogArticleForBlogIndexNoLimit');
    $router->map('GET', '/webapp/public/blog-tous-les-articles', function () {
        require '../views/blogAll.php';
    });

    $router->map('GET', '/webapp/public/evolution-des-appareils-hf-depuis-1983', function () {
        require '../views/appareils.php';
    });

    $router->map('POST', '/webapp/public/mot-de-passe-perdu', 'UserController#lostPasswordMail');
    $router->map('GET', '/webapp/public/mot-de-passe-perdu', function () {
        require '../views/lost.php';
    });

    $router->map('POST', '/webapp/public/mot-de-passe-retrouve', 'UserController#lostPassword');
    $router->map('GET', '/webapp/public/mot-de-passe-retrouve', function () {
        require '../views/foundPassword.php';
    });

    $router->map('GET', '/webapp/public/404', function () {
        require '../views/404.php';
    });

    $router->map('POST', '/webapp/public/mot-de-passe-perdu-log=[*:log]-cle=[*:cle]', 'UserController#lostPassword');
    $router->map('GET', '/webapp/public/mot-de-passe-perdu-log=[*:log]-cle=[*:cle]', function () {
        require '../views/passwordLost.php';
    });

    $router->map('GET', '/webapp/public/mentions-legales', function () {
        require '../views/mentions.php';
    });

    $router->map('POST', '/webapp/public/formulaire-pre-admission', 'ContentController#sendAdmissionMail');
    $router->map('GET', '/webapp/public/formulaire-pre-admission', function () {
        require '../views/admission.php';
    });

    $router->map('GET', '/webapp/public/contes-lpc', function () {
        require '../views/contesLpc.php';
    });

    $router->map('GET', '/webapp/public/contes-lpc-la-promenade-de-flaubert', function () {
        require '../views/flaubert.php';
    });
    $router->map('GET', '/webapp/public/contes-lpc-au-secours-papa', function () {
        require '../views/papa.php';
    });
    $router->map('GET', '/webapp/public/contes-lpc-le-lezard-se-chauffe-moi-aussi', function () {
        require '../views/lezard.php';
    });
    $router->map('GET', '/webapp/public/contes-lpc-le-livre-qui-dort', function () {
        require '../views/livre.php';
    });
    $router->map('GET', '/webapp/public/contes-lpc-l-elephant-se-douche-moi-aussi', function () {
        require '../views/elephant.php';
    });
    $router->map('GET', '/webapp/public/contes-lpc-le-loup', function () {
        require '../views/loup.php';
    });
    $router->map('GET', '/webapp/public/contes-lpc-projet-soupe-aux-frites', function () {
        require '../views/frite.php';
    });
    $router->map('GET', '/webapp/public/contes-lpc-p-tit-loup-rentre-a-l-ecole', function () {
        require '../views/ecole.php';
    });
    $router->map('GET', '/webapp/public/chansigne-lsf', function () {
        require '../views/chansigne.php';
    });

    // ZONE DE TEST
    $router->map('GET', '/webapp/public/test', function () {
        require '../test.php';
    });
} catch (\Exception $e) {
    echo $e->getMessage();
}

$match = $router->match();

if ($match == false) {
    var_dump($match);
    echo "<script type='text/javascript'>setTimeout(function () { window.location.href = '/webapp/public/404'; });</script>";
} else {
    if (is_string($match['target'])) {
        list($controller, $action) = explode('#', $match['target']);
        if (is_callable(array($controller, $action))) {
            $obj = new $controller();
            call_user_func_array(array($obj, $action), array($match['params']));
        } else {
            // here your routes are wrong.
            // Throw an exception in debug, send a  500 error in production
        }
    } else {
        if (is_array($match) && is_callable($match['target'])) {
            call_user_func_array($match['target'], $match['params']);
        } else {
            // no route was matched
            header($_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        }
    }
}
