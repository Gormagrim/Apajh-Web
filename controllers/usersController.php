<?php
require '../vendor/autoload.php';
use GuzzleHttp\Client;
class usersController
{
    private $client;
    public function __construct() {
        $this->client = new Client(['base_uri' => 'localhost/apiApajhv0/public/',
        'http_errors' => false]);
    }
    public function register() {
        $response = $this->client->request('POST', 'webapp/inscription.php', [
            'form_params' => [
                'mail' => $_POST['mail'],
                'password' => $_POST['password']
            ]
        ]);
        echo $response->getStatusCode();
        $register = json_decode($response->getBody());
        echo $register->message;
        echo $register->user->mail;
    }
}
