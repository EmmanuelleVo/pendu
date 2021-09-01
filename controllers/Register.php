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
        // TODO VALIDATION
        if (isset($name) || $name === '') {
            ['error' => 'Remplissez le champ nom'];
        }
        if (!ctype_alnum($name)) { // si ce ne sont pas que des lettres ou chiffres
            ['error' => 'Entrez des lettres ou des chiffres'];
        }
        if (isset($email) || $email === '') {
            ['error' => 'Remplissez le champ email'];
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            ['error' => 'Cet email est invalide. Exemple : test@test.com '];
        }
        if (isset($password) || $password === '') {
            ['error' => 'Remplissez le champ mot de passe'];
        }
        //Au moins 8 lettres, 1 majuscule et 1 chiffre
        if (preg_match('^\S*(?=\S{8,})(?=\S*[A-Z])(?=\S*[\d])$', $password)) {
            ['error' => 'Le mot de passe doit contenir au moins 8 lettres, 1 majuscule et 1 chiffre'];
        }

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        // Sauvegarder un nouvel user
        $userModel = new User();
        $user = $userModel->save(compact('name', 'email', 'password'));

        header('Location: index.php');
        exit();

    }
}