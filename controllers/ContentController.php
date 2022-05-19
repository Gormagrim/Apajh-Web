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
            'base_uri' => 'https://www.api.apajh-num-et-rik.fr/public/v1/',
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
            $page = $_SERVER['REQUEST_URI'];
            $request = $this->client->request('GET', 'videos');
            $category = json_decode($request->getBody());
            if ($page == '/webapp/public/auditif-categories') {
                require '../views/auditif-category.php';
            } else if ($page == '/webapp/public/admin') {
                require '../views/videosLdfAdmin.php';
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getVideosByLike()
    {
        try {
            $request = $this->client->request('GET', 'likeVideos', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $_SESSION['token']
                ]
            ]);
            $likeVideo = json_decode($request->getBody());
            require '../views/favoris.php';
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
                
                $toto = htmlspecialchars($_POST['contentTitle']);
                $title = htmlentities($toto);
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

    // Début des méthodes du blog
    public function getBlogArticleForBlogIndex()
    {
        try {
            $request = $this->client->request('GET', 'article', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $_SESSION['token']
                ]
            ]);
            $blogArticle = json_decode($request->getBody());
            require '../views/blogIndex.php';
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getBlogArticleForBlogIndexNoLimit()
    {
        try {
            $request = $this->client->request('GET', 'article', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $_SESSION['token']
                ]
            ]);
            $blogArticle = json_decode($request->getBody());
            require '../views/blogAll.php';
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getPhoto($fileName)
    {
        $photo = $this->client->request('GET', 'photo/' . $fileName);
        $blogPhoto = json_decode($photo->getBody());
        ($photo->getStatusCode() == 200) ? $src = 'data:' . $blogPhoto->type . ';base64,' . $blogPhoto->file : $src = '';
        return $src;
    }

    public function getBlogArticleById($id)
    {
        try {
            $request = $this->client->request('GET', 'article/' . $id['id'], [
                'headers' => [
                    'Authorization' => 'Bearer ' . $_SESSION['token']
                ]
            ]);
            $articleId = json_decode($request->getBody());
            require '../views/article.php';
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getBlogArticleByIdd($id)
    {
        try {
            $request = $this->client->request('GET', 'article/' . $id, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $_SESSION['token']
                ]
            ]);
            $articleId = json_decode($request->getBody());
            require '../views/article.php';
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function sendAdmissionMail()
    {
        $formErrors = array();
        $formSuccess = array();
        if (count($_POST) > 0) {
            if (!empty($_POST['civilite'])) {
                $civilite = htmlspecialchars($_POST['civilite']);
            } else {
                $formErrors['civilite'] = 'Vous devez choisir votre civilité.';
            }
            if (!empty($_POST['nom'])) {
                $nom = htmlspecialchars($_POST['nom']);
            } else {
                $formErrors['nom'] = 'Vous devez saisir votre nom.';
            }
            if (!empty($_POST['prenom'])) {
                $prenom = htmlspecialchars($_POST['prenom']);
            } else {
                $formErrors['prenom'] = 'Vous devez saisir votre prénom.';
            }
            $patternPhone = '/^([0][1-79]){1}(?:[\s.-]*\d{2}){4}$/';
            if (!empty($_POST['tel'])) {
                if (preg_match($patternPhone, $_POST['tel'])) {
                    $tel = htmlspecialchars($_POST['tel']);
                } else {
                    $formErrors['tel'] = 'Vous devez saisir un numéro de téléphone valide.';
                }
            } else {
                $formErrors['tel'] = 'Vous devez saisir votre numéro de téléphone.';
            }
            if (!empty($_POST['mail'])) {
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $mail = htmlspecialchars($_POST['mail']);
                } else {
                    $formErrors['mail'] = 'Vous devez saisir une adresse mail valide.';
                }
            } else {
                $formErrors['mail'] = 'Vous devez saisir votre adresse mail.';
            }
            if (!empty($_POST['you'])) {
                $you = htmlspecialchars($_POST['you']);
            } else {
                $formErrors['you'] = 'Vous devez préciser qui vous êtes.';
            }
            if ($_POST['you'] == 'Autre') {
                if (!empty($_POST['autre'])) {
                    $you = htmlspecialchars($_POST['you']);
                } else {
                    $formErrors['you'] = 'Vous devez préciser qui vous êtes.';
                }
            }
            if (!empty($_POST['message'])) {
                $message = htmlspecialchars($_POST['message']);
            } else {
                $formErrors['message'] = 'Vous devez saisir un message.';
            }
            if (empty($formErrors)) {
                require '../views/admission.php';
                $destinataire = 's.larrivee@apajh.asso.fr';
                $sujet = 'Mail de contact de' . $civilite . ' ' . $nom . ' ' . $prenom;
                $entete = 'Son numéro de téléphine est le ' . $tel . ', son mail est : ' . $mail . '. Cette personne est ' . $you . ' ' . (!empty($autre) ? '(' . $autre . ')' : '');
                $text = $message;
                mail($destinataire, $sujet, $text, $entete);
            } else {
                require '../views/admission.php';
            }
        }
    }
    
}
