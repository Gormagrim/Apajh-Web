<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;

class LikeController
{
    private $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.api.apajh-num-et-rik.fr/public/v1/',
            'http_errors' => false
        ]);
    }

    public function like()
    {
        $formErrors = array();
        if (isset($_POST['placeLike'])) {
            if (time() < $_SESSION['logOutTime']) {
                $like = htmlspecialchars($_POST['placeLike']);
                $request = $this->client->request('POST', 'likematch', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $_SESSION['token']
                    ],
                    'form_params' => [
                        'id_content' => $like
                    ]
                ]);
                $isLiked = json_decode($request->getBody());
                $likke = $isLiked->isLike;
                if ($isLiked->isLike == 0) {
                    $request = $this->client->request('POST', 'like', [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $_SESSION['token']
                        ],
                        'form_params' => [
                            'id_content' => $like
                        ]
                    ]);
                    $liked = json_decode($request->getBody());
                    var_dump($liked->isLike);
                    require '../views/auditif.php';
                } else {
                    $request = $this->client->request('DELETE', 'like', [
                        'headers' => [
                            'Authorization' => 'Bearer ' . $_SESSION['token']
                        ],
                        'form_params' => [
                            'id_content' => $like
                        ]
                    ]);
                    $liked = json_decode($request->getBody());
                    require '../views/auditif.php';
                }
            } else {
                $formErrors['token'] = 'Vous devez vous connecter pour aimer notre contenu.';
            }
        }
    }

}
