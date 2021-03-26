<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;

class LikeMatchController
{
    private $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost/apiApajhv0/public/v1/',
            'http_errors' => false
        ]);
    }

    public function likeMatch()
    {
        $formErrors = array();
        if (isset($_POST['idContent'])) {
            if (!empty($_SESSION['token'])) {
                $idContent = htmlspecialchars($_POST['idContent']);
                $request = $this->client->request('POST', 'likematch', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $_SESSION['token']
                    ],
                    'form_params' => [
                        'id_content' => $idContent
                    ]
                ]);
                $isLike = json_decode($request->getBody());
                $isLikke = $isLike->isLike;
                var_dump($isLikke);
                echo '<span id="isLikke" data-isLikke="' . $isLikke . '">' . $isLikke . '</span>';
                echo  '<script>var isLikke = ' . json_encode($isLikke) . '</script>';

                require '../views/auditif.php';
            }else {
                $formErrors['token'] = 'Vous devez vous connecter pour aimer notre contenu.';
            }
        }
    }
}
