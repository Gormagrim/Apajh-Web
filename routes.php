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
    $router->map('GET', '/webapp/public/connexion', function () {
        require '../views/connexion.php';
    });
    $router->map('POST', '/webapp/public/connexion', 'UserController#login');
    $router->map('GET', '/webapp/public/acount', 'UserController#getUserDescription');
    $router->map('POST', '/webapp/public/acount', 'UserController#descriptionUpdate');

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

    $router->map('POST', '/webapp/public/auditif-categorie-[:format]?', function () {
        require '../views/auditif-category.php';
    });


    $router->map('POST', '/webapp/public/deconnexion', 'UserController#logout');
    $router->map('GET', '/webapp/public/blog', function () {
        require '../views/article.php';
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
