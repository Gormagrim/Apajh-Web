<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;

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
        $formErrors = array();
        if (!empty($_POST['mail']) && !empty($_POST['password'])) {
            $this->client->mail = htmlspecialchars($_POST['mail']);
            $this->client->password = htmlspecialchars($_POST['password']);
            $response = $this->client->request('POST', 'register', [
                'form_params' => [
                    'mail' => $this->client->mail,
                    'password' => $this->client->password
                ]
            ]);
            // echo $response->getStatusCode();
            $register = json_decode($response->getBody());
            if (isset($register->message)) {
               $validateRegister = $register->message;
            } else {
               $formErrors['mail'] = $register->mail[0];
            }
        } else {
            $response = $this->client->request('POST', 'register');
            $register = json_decode($response->getBody());
            if (empty($this->client->mail)) {
               $formErrors['mail'] = $register->mail[0];
            } else if (empty($this->client->password)) {
               $formErrors['password'] = $register->password[0];
            }
        }
    }
}
