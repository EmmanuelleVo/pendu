<?php


namespace Controllers;


use Models\User;

class Register
{
    public function create() {
        $view = './views/register/create.php';

        return compact('view');
    }

    public function store() {

        // Collecte et validation
        //ici : si tout se passe bien
        // TODO VALIDATION
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Sauvegarder un nouvel user

        $userModel = new User();
        $user = $userModel->save(compact('name', 'email', 'password'));

        header('Location: index.php');
        exit();

    }
}