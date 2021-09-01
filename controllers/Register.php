<?php

namespace Controllers;

use Models\User;

class Register
{
    public function create()
    {
        $view = './views/register/create.php';

        return compact('view');
    }

    public function store()
    {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $passwordConfirm = $_POST['confirm_password'];
        // TODO VALIDATION
        if (!isset($name) || $name === '') {
            $_SESSION['errors']['name'] = 'Remplissez le champ nom';
            header('Location: index.php?action=view&resource=register-form');
            exit();
        }
        /*if (!ctype_alnum($name)) { // si ce ne sont pas que des lettres ou chiffres
            $_SESSION['errors']['name'] = 'Entrez des lettres ou des chiffres';
            header('Location: index.php?action=view&resource=register-form');
            exit();
        }*/
        if (!isset($email) || $email === '') {
            $_SESSION['errors']['email'] = 'Remplissez le champ email';
            header('Location: index.php?action=view&resource=register-form');
            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors']['email'] = 'Cet email est invalide. Exemple : test@test.com';
            header('Location: index.php?action=view&resource=register-form');
            exit();
        }
        if (!isset($password) || $password === '') {
            $_SESSION['errors']['password'] = 'Remplissez le champ';
            header('Location: index.php?action=view&resource=register-form');
            exit();
        }
        //Au moins 8 lettres, 1 majuscule et 1 chiffre TODO
        if (preg_match('^\S*(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])$', $password)) {
            $_SESSION['errors']['password'] = 'Le mot de passe doit contenir au moins 8 lettres, 1 majuscule et 1 chiffre';
            header('Location: index.php?action=view&resource=register-form');
            exit();
        }
        if (!isset($passwordConfirm) || $passwordConfirm === '') {
            $_SESSION['errors']['password'] = 'Remplissez le champ';
            header('Location: index.php?action=view&resource=register-form');
            exit();
        }
        if ($passwordConfirm !== $password) {
            $_SESSION['errors']['confirm_password'] = 'La confirmation du mot de passe est érronée';
            header('Location: index.php?action=view&resource=register-form');
            exit();
        }

        /*switch ($_SESSION['errors']) {
            case (!isset($name) || $name === ''):
                $_SESSION['errors']['name'] = 'Remplissez le champ nom';
                break;
            case (!ctype_alnum($name)):
                $_SESSION['errors']['name'] = 'Entrez des lettres ou des chiffres';
                break;
            case (!isset($email) || $email === ''):
                $_SESSION['errors']['email'] = 'Remplissez le champ email';
                break;
            case (!filter_var($email, FILTER_VALIDATE_EMAIL)):
                $_SESSION['errors']['email'] = 'Cet email est invalide. Exemple : test@test.com';
                break;
            case (!isset($password) || $password === ''):
                $_SESSION['errors']['password'] = 'Remplissez le champ mot de passe';
                break;
            case (preg_match('^\S*(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])$', $password)):
                $_SESSION['errors']['password'] = 'Le mot de passe doit contenir au moins 8 lettres, 1 majuscule et 1 chiffre';
                break;
            case (!isset($passwordConfirm) || $passwordConfirm === ''):
                $_SESSION['errors']['password'] = 'Remplissez le champ';
                break;
            case ($passwordConfirm !== $password):
                $_SESSION['errors']['confirm_password'] = 'La confirmation du mot de passe est érronée';
                break;
            default: header('Location: index.php?action=view&resource=register-form');
                    exit();
        }*/

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Sauvegarder un nouvel user
        $userModel = new User();
        $user = $userModel->save(compact('name', 'email', 'password'));

        header('Location: index.php');
        exit();

    }
}