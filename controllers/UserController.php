<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\Request;
class UserController
{
    private $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost/apiApajhv0/public/v1/',
            'http_errors' => false
        ]);
    }
    public function register()
    {
        $formErrors = [];
        $patternMail = '#^([a-zA-Z0-9À-ÖØ-öø-ÿ\.\-\_]+)@([a-zA-Z0-9À-ÖØ-öø-ÿ\-\_\.]+)\.([a-zA-Z\.]{2,250})$#';
        $return = $this->client->request('POST', 'register');
        $errors = json_decode($return->getBody());
        // si les champs ne sont pas vide
        if (count($_POST) > 0) {
            if (!empty($_POST['mail'])) {
                if (preg_match($patternMail, $_POST['mail'])) {
                    $mail = htmlspecialchars($_POST['mail']);
                } else {
                    $return = $this->client->request('POST', 'register');
                    $errors = json_decode($return->getBody());
                    $formErrors['mail'] = $errors->mail[0];
                }
            } else {
                $formErrors['mail'] = $errors->mail[0];
            }
            if (!empty($_POST['password'])) {
                $password = htmlspecialchars($_POST['password']);
            } else {
                $formErrors['password'] = $errors->password[0];
                require '../views/register.php';
            }
        }
        if (count($formErrors) == 0) {
            $response = $this->client->request('POST', 'register', [
                'form_params' => [
                    'mail' => $mail,
                    'password' => $password
                ]
            ]);
            $register = json_decode($response->getBody());
            echo $register->message;
        }
    }
}
