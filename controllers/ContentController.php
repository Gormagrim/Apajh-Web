<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;

class ContentController
{
    private $client;
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://localhost/apiApajhv0/public/v1/',
            'http_errors' => false
        ]);
    }

    public function getVideoLds($fileName)
    {
        $request = $this->client->request('GET', 'video/' . $fileName);
        $video = json_decode($request->getBody());
        ($request->getStatusCode() == 200) ? $src = 'data:' . $video->type . ';base64,' . $video->file : $src = '';
        return $src;
    }

    public function getCategory()
    {
        try {
            $request = $this->client->request('GET', 'videos');
            $category = json_decode($request->getBody());
            require '../views/auditif-category.php';
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getVideoByCat()
    {
        $formErrors = array();
        if (count($_POST) > 0) {
            if (!empty($_POST['id_category'])) {
                $cat = htmlspecialchars($_POST['id_category']);
            }
            if (empty($formErrors)) {
                $request = $this->client->request('POST', 'videos-cat', [
                    'form_params' => [
                        'id_category' => $cat
                    ]
                ]);
                $video = json_decode($request->getBody());
                require '../views/auditif-cat-video.php';
            } else {
                require '../views/auditif-cat-video.php';
            }
        }
    }

    public function searchVideo()
    {
        $formErrors = array();
        if (count($_POST) > 0) {
            if (!empty($_POST['contentTitle'])) {
                $title = htmlspecialchars($_POST['contentTitle']);
            } else {
                $formErrors['search'] = 'Merci de bien vouloir saisir le mot que vous voulez rechercher.';
            }
            if (empty($formErrors)) {
                $request = $this->client->request('POST', 'rechercheVideo', [
                    'form_params' => [
                        'contentTitle' => $title
                    ]
                ]);
                $video = json_decode($request->getBody());
                require '../views/auditif.php';
            } else {
                require '../views/auditif.php';
            }
        }
    }


}
