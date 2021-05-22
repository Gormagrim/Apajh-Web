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
    $router->map('GET', '/webapp/public/blog', function () {
        require '../views/blogIndex.php';
    });
    $router->map('GET', '/webapp/public/blog-article', function () {
        require '../views/article.php';
    });
    $router->map('GET', '/webapp/public/qui-sommes-nous', function () {
        require '../views/us.php';
    });
    $router->map('POST', '/webapp/public/activation-log=[*:log]-cle=[*:cle]', 'UserController#activate');
    $router->map('GET', '/webapp/public/activation-log=[*:log]-cle=[*:cle]', function () {
        require '../views/activation.php';
    });

    $router->map('GET', '/webapp/public/test', function () {
        require '../test.php';
    });
} catch (\Exception $e) {
    echo $e->getMessage();
}

$match = $router->match();
if ($match === false) {
    echo 'Problème de route';
    // here you can handle 404
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
