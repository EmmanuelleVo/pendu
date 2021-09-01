<?php

namespace Controllers;

//use Models\User;

class Login
{
    //
    function create() {
        $view = './views/login/create.php';

        return compact('view');
    }

    function check() {

        // TODO Validation à faire - filter/validate,...

        $email = $_POST['email'];
        $password = $_POST['password'];

        //Identification
        $userModel = new \Models\User();
        //var_dump($userModel);
        $user = $userModel->find($email);

        // Authentification (password = password de la DB)
        if (password_verify($password, $user->password)) {
            // Connecter l'user au site pour qu'il soit reconnu lors des prochaines requêtes
            $_SESSION['user'] = $user;


            header('Location: index.php');
        } else {
            header('Location: index.php?action=view&resource=login-form');
        }

        exit();
    }

    function delete() {

        // Détruit toutes les variables de session
        $_SESSION = array();

        // Si vous voulez détruire complètement la session, effacez également, le cookie de session.
        // Note : cela détruira la session et pas seulement les données de session !
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Finalement, on détruit la session.
        session_destroy();

        header('Location: index.php');
        exit();
    }

}