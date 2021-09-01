<?php

namespace Models;


class Game extends Model
{
    /*public function findAll(string $name): \stdClass
    {
        $wordRequest = 'SELECT * FROM teams WHERE name = :name';
        $pdoSt = $this->pdo->prepare($wordRequest);
        $pdoSt->execute([':name' => $name]);

        return $pdoSt->fetch();
    }*/

    public function all(): array
    {
        $wordRequest = 'SELECT * FROM words';
        $pdoSt = $this->pdo->query($wordRequest);

        return $pdoSt->fetchAll();
    }


    /*public function save(array $letter)
    {
        try {
            $insertTeamRequest = 'INSERT INTO teams(`name`, `slug`, `file_name`) VALUES (:name, :slug, :file_name)';
            $pdoSt = $this->pdo->prepare($insertTeamRequest);
            $pdoSt->execute([':name' => $letter['name'],
                ':slug' => $letter['slug'],
                ':file_name' => $letter['file_name']]);

        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }*/


    /*public function save(array $word) {
        try {
            $insertWordRequest = 'INSERT INTO words(`word`) VALUES (:word)';
            $pdoSt = $this->pdo->prepare($insertWordRequest);
            $pdoSt->execute([':word' => $word['name']]);

        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }*/
}





/*
 * Login : create (user - mail - password) (session) + delete/modify
 * Nombre de fois joué (gagné/perdu) pour un user (store)
 * 1 game :
    * Start : On vient de se co + choix au hazard d'un mot de la DB
    * After-trial : Après avoir submit une lettre + comparaison entre array letters et array des lettres du mot
        * Lost : Nombre de trials = 0 et on n'a pas trouvé le mot
        * Won : Nombre de trials >=0 et on a trouvé le mot
    * Si Won ou Lost -> +1 au nombre de fois jouer du user en question
 * Déconnexion : fermer la session
 *
 * */

/*fezf

LOGIN :
view:
    - User
    - Mail
    - Password
    - Action = check et resource = login
- models:
    - Un SELECT du user, name, email et password
-controllers login:
    - create() pour la vue
    - check() pour
        - vérifier l'identité et l'authenticité
        - Collecte et validation de données de l'user envoyées avec le formulaire avec le $_POST
        - Identification
        - Authentification (password = password de la DB) avec password_verify() et $_SESSION['user'] = $user;

REGISTER :
view:
    - User
    - Mail
    - Password
    - Confirmation du password
    - Action = store et resource = user
- models:
    - Un SELECT du user, name, email et password
-controllers register:
    - create() pour la vue
    - store() pour stocker dans variable $user/mail/password = $_POST ($password = password_hash($_POST['password'], PASSWORD_BCRYPT);)
    - sauvegarder un nouvel user avec $userModel = new User(); et $user = $userModel->save(compact('name', 'email', 'password'));

IF LOGIN OK et qu'on vient de se login ou de recommencer du lost.php alors, la page start.php apparait :
- génère automatique au hazard un mot de la DB
- view:
    - Action = store? et resource = game
- models :
    - un SELECT de tous les mots
    - ID au hazard
- controllers start-game :
    - create() pour vue start
    - store()? ou show() pour déterminer le mot pris au hazard (grâce à ID)
    -

Au submit d'une lettre :
- view :
    - Action = store? et resource = game
- models : /
- controllers after-trial-game :
    - create() pour vue after-trial
    - store()? pour comparer la lettre de $letters = $_POST à $array des letters du mot
        - Si mot découvert : vue won.php et +1 au nombre de fois joué
        - Si perdu : vue lost.php et +1 au nombre de fois joué



-view : Action = store? et resource = game
- models :
- controllers start-game :






Les cookies :

setcookie(key, value, date d'expiration')
On peut avoir plusieurs value grace à serialize ($array value -> serialize)
(un)serialize : tableau <=> string
htmlentities()

if(!empty$_POST[action] === deconnexion)
    unset($_COOKIE[user]) // détruit juste la $user
    setcookie(user, '', time() - 10) // faire un setcookie dans le passé pour détruire la session
if(!empty($_COOKIE[user]))
    $name = $_COOKIE[user]
if(!empty($_POST[name]))
    setcookie(user, $_POST['name'], time() + 60*60*24);
    $nom = $_POST['name']


SESSION :

session_start()
$_SESSION




*/
