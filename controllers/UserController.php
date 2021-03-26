<?php
require '../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Stream;

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
        $success = array();
        // si les champs ne sont pas vide
        if (count($_POST) > 0) {
            if (!empty($_POST['mail'])) {
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $check = $this->client->request('POST', 'checkMail', [
                        'form_params' => [
                            'mail' => htmlspecialchars($_POST['mail'])
                        ]
                    ]);
                    $checkmail = json_decode($check->getBody());
                    if ($checkmail->message === 0) {
                        $mail = htmlspecialchars($_POST['mail']);
                    } else {
                        $formErrors['mail'] = 'Cette adresse mail est déjà utilisée sur notre site.';
                    }
                } else {
                    $formErrors['mail'] = 'Une adresse mail valide est nécessaire à l\'inscription.';
                }
            } else {
                $formErrors['mail'] = 'Une adresse mail est nécessaire à l\'inscription.';
            }
            if (!empty($_POST['password']) && $_POST['password'] === $_POST['password_validation']) {
                $password = htmlspecialchars($_POST['password']);
            } else {
                $formErrors['password'] = 'Un mot de passe est nécessaire à l\'inscription.';
            }
            if (empty($_POST['password_validation'])) {
                $formErrors['password_validation'] = 'Merci de bien vouloir valider votre mot de passe.';
            }
            if ($_POST['password'] != $_POST['password_validation']) {
                $formErrors['password_validation'] = 'Vos mots de passe ne sont pas identique.';
                $formErrors['password'] = 'Vos mots de passe ne sont pas identique.';
            }
            if (empty($_POST['termsOfUse'])) {
                $formErrors['termsOfUse'] = true;
            }
            if (empty($formErrors)) {
                if ($this->client->request('POST', 'register', [
                    'form_params' => [
                        'mail' => $mail,
                        'password' => $password
                    ]
                ])) {
                    $success['valid'] = 'Votre inscription a bien été prise en compte. Merci de cliquer sur le lien qui vient de vous être envoyé par mail pour la valider.';
                    require '../views/registerValidate.php';
                } else {
                    $success['error'] = 'Une erreur est surevenue durant la création de votre compte.';
                }
            } else {
                require '../views/register.php';
            }
        }
    }

    public function login()
    {
        $formErrors = array();
        $success = array();
        // si les champs ne sont pas vide
        if (count($_POST) > 0) {
            if (!empty($_POST['mail'])) {
                if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                    $check = $this->client->request('POST', 'checkMail', [
                        'form_params' => [
                            'mail' => htmlspecialchars($_POST['mail'])
                        ]
                    ]);
                    $checkmail = json_decode($check->getBody());
                    if ($checkmail->message === 1) {
                        $mail = htmlspecialchars($_POST['mail']);
                        if (!empty($_POST['password'])) {
                            $checkpwd = $this->client->request('POST', 'checkPassword', [
                                'form_params' => [
                                    'password' => htmlspecialchars($_POST['password']),
                                    'mail' => htmlspecialchars($_POST['mail'])
                                ]
                            ]);
                            $checkpassword = json_decode($checkpwd->getBody());
                            if ($checkpassword->message === 1) {
                                $password = htmlspecialchars($_POST['password']);
                            } else {
                                $formErrors['password'] = $checkpassword->message;
                            }
                        } else {
                            $formErrors['password'] = 'Un mot de passe est nécessaire à la connexion.';
                        }
                    } else {
                        $formErrors['mail'] = 'Cette adresse mail est inconnue sur notre site.';
                    }
                } else {
                    $formErrors['mail'] = 'Une adresse mail valide est nécessaire pour se connecter.';
                }
            } else {
                $formErrors['mail'] = 'Une adresse mail est nécessaire pour se connecter.';
            }

            if (empty($formErrors)) {
                if ($response = $this->client->request('POST', 'login', [
                    'form_params' => [
                        'mail' => $mail,
                        'password' => $password
                    ]
                ])) {
                    $register = json_decode($response->getBody());
                    $_SESSION['token'] = $register->token->original->access_token;
                    $_SESSION['id'] = $register->id;
                    $_SESSION['logTime'] = time();
                    $_SESSION['logOutTime'] = (time() + 3600);
                    $_SESSION['mail'] = $mail;
                    $success['valid'] = 'Vous vous êtes correctement connecté.';
                    // require '../views/connexionValidate.php';
                    header('refresh:0;url=http://localhost/webapp/public/');
                } else {
                    $success['error'] = 'Une erreur est surevenue durant la connexion.';
                }
            } else {
                require '../views/connexion.php';
            }
        }
    }

    public function logout()
    {
        $this->client->request('POST', 'logout');
        session_destroy();
        $success['valid'] = 'Vous vous êtes correctement déconnecté.';
        //  require '../views/deconnexion.php';
        header('refresh:0;url=http://localhost/webapp/public/');
        exit();
    }

    public function getUserDescription()
    {
        if (!empty($_SESSION['token'])) {
            try {
                $request = $this->client->request('GET', 'user', [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $_SESSION['token']
                    ]
                ]);
                $userInformation = json_decode($request->getBody());
                if (!empty($userInformation->user->mail)) {
                    $user['mail'] = $userInformation->user->mail;
                }
                if (!empty($userInformation->user_description->lastname)) {
                    $user['lastname'] = $userInformation->user_description->lastname;
                }
                if (!empty($userInformation->user_description->firstname)) {
                    $user['firstname'] = $userInformation->user_description->firstname;
                }
                if (!empty($userInformation->ville->cities)) {
                    $user['city'] = $userInformation->ville->cities;
                }
                if (!empty($userInformation->user_description->job)) {
                    $user['job'] = $userInformation->user_description->job;
                }
                require '../views/personnalInformation.php';
            } catch (\Exception $e) {
                echo $e->getMessage();
            }
        } else {
            $formErrors['login'] = 'Vous devez vous reconnecter.';
            require '../views/personnalInformation.php';
        }
    }

    public function descriptionUpdate()
    {
        $formErrors = array();
        $success = array();
        $patternName = '/^([A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+)([- ]{1}[A-Z]{1}[a-zÀ-ÖØ-öø-ÿ]+){0,3}$/';

        if (!empty($_SESSION['token'])) {
            if ($request = $this->client->request('GET', 'user', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $_SESSION['token']
                ]
            ])) {
                $userInformation = json_decode($request->getBody());
                $user['mail'] = $userInformation->user->mail;
                $user['lastname'] = $userInformation->user_description->lastname;
                $user['firstname'] = $userInformation->user_description->firstname;
                $user['city'] = $userInformation->ville->cities;
                $user['job'] = $userInformation->user_description->job;
                if (count($_POST) > 0) {
                    if (!empty($_POST['lastname']) || !empty($userInformation->user_description->lastname)) {
                        if (preg_match($patternName, $_POST['lastname'])) {
                            $lastname = htmlspecialchars($_POST['lastname']);
                        } else {
                            $formErrors['lastname'] = 'Merci de saisir correctement votre nom de famille.';
                        }
                    } else {
                        $formErrors['lastname'] = 'Merci de bien vouloir saisir votre nom de famille.';
                    }
                    if (!empty($_POST['firstname'])) {
                        if (preg_match($patternName, $_POST['firstname'])) {
                            $firstname = htmlspecialchars($_POST['firstname']);
                        } else {
                            $formErrors['firstname'] = 'Merci de saisir correctement votre prénom.';
                        }
                    } else {
                        $formErrors['firstname'] = 'Merci de bien vouloir saisir votre prénom.';
                    }
                    if (!empty($_POST['job'])) {
                        $job = htmlspecialchars($_POST['job']);
                    } else {
                        $formErrors['job'] = 'Merci de bien vouloir saisir votre métier.';
                    }
                    if (!empty($_POST['city'])) {
                        $city = htmlspecialchars($_POST['city']);
                    } else {
                        $formErrors['city'] = 'Merci de bien vouloir saisir votre ville.';
                    }

                    if (empty($formErrors)) {
                        if (empty($user['lastname']) && empty($user['firstname']) && empty($user['job']) && empty($user['city'])) {
                            if ($this->client->request('POST', 'user', [
                                'form_params' => [
                                    'firstname' => $firstname,
                                    'lastname' => $lastname,
                                    'job' => $job,
                                    'id_location' => $city
                                ],
                                'headers' => [
                                    'Authorization' => 'Bearer ' . $_SESSION['token']
                                ]
                            ])) {
                                $success['valid'] = 'Vos informations ont bien été ajoutés.';
                                $user['lastname'] = $lastname;
                                $user['firstname'] = $firstname;
                                $user['city'] = $city;
                                $user['job'] = $job;
                                require '../views/personnalInformation.php';
                            } else {
                                $success['error'] = 'Une erreur est surevenue durant l\'ajout de vos informations.';
                            }
                        } else {
                            if ($this->client->request('PUT', 'user', [
                                'form_params' => [
                                    'firstname' => $firstname,
                                    'lastname' => $lastname,
                                    'job' => $job,
                                    'id_location' => $city
                                ],
                                'headers' => [
                                    'Authorization' => 'Bearer ' . $_SESSION['token']
                                ]
                            ])) {
                                $success['valid'] = 'Vos informations ont bien été modifiés.';
                                $user['lastname'] = $lastname;
                                $user['firstname'] = $firstname;
                                $user['city'] = $city;
                                $user['job'] = $job;
                                require '../views/personnalInformation.php';
                            } else {
                                $success['error'] = 'Une erreur est surevenue durant la modification de vos informations.';
                            }
                        }
                    } else {
                        require '../views/personnalInformation.php';
                    }
                }
            }
        }
    }

    public function passwordModification()
    {
        if (!empty($_SESSION['token'])) {
            if (count($_POST) > 0) {
                if (!empty($_POST['current_password']) || !empty($_POST['password']) || !empty($_POST['password_confirmation'])) {
                    if ($_POST['password'] === $_POST['password_confirmation']) {
                        if ($_POST['current_password'] != $_POST['password']) {
                            $request = $this->client->request('POST', 'checkPassword', [
                                'form_params' => [
                                    'password' => $_POST['current_password'],
                                    'mail' => $_SESSION['mail']
                                ]
                            ]);
                            $checkPassword = json_decode($request->getBody());
                            if ($checkPassword->message === 1) {
                                $password = htmlspecialchars($_POST['password']);
                                $current_password = htmlspecialchars($_POST['current_password']);
                                $password_confirmation = htmlspecialchars($_POST['password_confirmation']);
                            } else {
                                $formErrors['current_password'] = 'Veuillez saisir votre mot de passe actuel.';
                            }
                        } else {
                            $formErrors['current_password'] = 'Votre nouveau mot de passe ne peut pas être identique à l\'ancien.';
                            $formErrors['password'] = 'Votre nouveau mot de passe ne peut pas être identique à l\'ancien.';
                        }
                    } else {
                        $formErrors['password_confirmation'] = 'Vos nouveaux mots de passe ne sont pas identique.';
                        $formErrors['password'] = 'Vos nouveaux mots de passe ne sont pas identique.';
                    }
                } else {
                    $formErrors['password'] = 'Veuillez saisir votre nouveau mot de passe.';
                    $formErrors['current_password'] = 'Veuillez saisir votre mot de passe actuel.';
                    $formErrors['password_confirmation'] = 'Veuillez confirmer votre nouveau mot de passe.';
                }
                if (empty($formErrors)) {
                    if ($this->client->request('PUT', 'user/password', [
                        'form_params' => [
                            'password' => $password,
                            'password_confirmation' => $password_confirmation,
                            'current_password' => $current_password
                        ],
                        'headers' => [
                            'Authorization' => 'Bearer ' . $_SESSION['token']
                        ]
                    ])) {
                        $success['valid'] = 'Votre mot de passe a bien été modifié.';
                        require '../views/passwordModification.php';
                    }
                } else {
                    require '../views/passwordModification.php';
                }
            }
        }
    }
}
