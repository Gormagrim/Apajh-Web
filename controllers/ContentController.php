<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;

class ContentController
{
    public function getContentVideos()
    {
        if (!empty($_SESSION['token'])) {
            require '../views/auditif.php';
            try {
                
                $request = $this->client->request('GET', 'video', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $_SESSION['token']
                    ]
                ]);
                $video = json_decode($request->getBody());
                var_dump($video);

                if (!empty($video->Contenu->contentTitle)) {
                    $video['title'] = $video->Contenu->contentTitle;
                }

            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $formErrors['login'] = 'Vous devez vous reconnecter.';
            require '../views/personnalInformation.php';
        }
    }
}