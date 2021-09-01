<?php

namespace Models;


class User extends Model
{
    protected $table = 'users';
    protected $findKey = 'email';

    public function save(array $user)
    {
        try {
            $insertUserRequest = 'INSERT INTO users(`name`, `email`, `password`) VALUES (:name, :email, :password)';
            $pdoSt = $this->pdo->prepare($insertUserRequest);
            $pdoSt->execute([':name' => $user['name'], ':email' => $user['email'],':password' => $user['password']]);

        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}



