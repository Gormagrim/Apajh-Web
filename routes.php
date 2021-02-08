<?php
require '../vendor/autoload.php';
require '../controllers/usersController.php';
$router = new AltoRouter();

try{
    $router->map('POST', '/register', 'userControllers#register');

}catch (\Exception $e){
    echo $e->getMessage();
}

$match = $router->match();
if ($match === false) {
    // here you can handle 404
} else {
    if(is_string($match['target'])){
        list( $controller, $action ) = explode( '#', $match['target'] );
        if ( is_callable(array($controller, $action)) ) {
            $obj = new $controller();
            call_user_func_array(array($obj,$action), array($match['params']));
        } else {
            // here your routes are wrong.
            // Throw an exception in debug, send a  500 error in production
        }
    }else {
        if( is_array($match) && is_callable( $match['target'] ) ) {
            call_user_func_array( $match['target'], $match['params'] );
        } else {
            // no route was matched
            header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
        }
    }
}

