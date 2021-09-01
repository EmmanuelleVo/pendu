<?php

namespace Controllers;

use Models\Game;

class Trial
{
    //
    function create()
    {
        $view = './views/after-trial.php';
        return compact('view');
    }

    function store()
    {        $view = './views/after-trial.php';

        $gameState = 'start';
        $trialModel = new Game();
        $words = $trialModel->all();
        //$wordIndex = $_COOKIE['wordIndex'];
        var_dump($_SESSION['word']);
        //$letters = unserialize(urldecode($_SESSION['letters']));
        // ==> $letters = json_decode($_COOKIE['letters'], true);
        //$letters = $_SESSION['letters'];
        //$triedLetter = $_POST['triedLetter'];

        if (!ctype_alpha($_POST['triedLetter'])) { //si ce ne sont pas que des lettres
            return ['error' => 'Ceci n’est pas une lettre de l’alphapbet.'];
        }
        if (!array_key_exists($_POST['triedLetter'], $_SESSION['letters'])) {
            return ['error' => 'Ce n’est pas une des lettres disponibles'];
        }

        // Calcul des nouvelles valeurs du state
        $_SESSION['letters'][$_POST['triedLetter']] = false;

        $letterFound = false;

        $triedLetters = array_filter($_SESSION['letters'], fn($bool) => !$bool);
        $trials = count(array_filter(array_keys($triedLetters), fn($l) => !str_contains($_SESSION['word'], $l)));
        $lettersCount = strlen($_SESSION['word']);
        $replacementString = str_pad('', $lettersCount, REPLACEMENT_CHAR);
        //setting new values
        $letterFound = false;
        //$triedLetters .= $triedLetter;

        //checking if letter is in word
        for ($i = 0; $i < $lettersCount; $i++) {
            $replacementString[$i] = array_key_exists($_SESSION['word'][$i], $triedLetters) ? $_SESSION['word'][$i] : REPLACEMENT_CHAR;
            if ($_POST['triedLetter'] === substr($_SESSION['word'], $i, 1)) {
                $letterFound = true;
            }
        }
        if (!$letterFound) {
            if (MAX_TRIALS <= $trials) {
                $gameState = 'lost';
            }
        } else {
            if ($_SESSION['word'] === $replacementString) {
                $gameState = 'win';
            }
        }

        $serializedLetters = urlencode(serialize($_SESSION['letters'])); // en get et en post
        setcookie('letters', urlencode(serialize($_SESSION['letters'])), time() + 3600);
        // ==> setcookie('letters', json_encode($letters), time() + 3600);
        $triedLettersStr = implode(', ', array_keys($triedLetters));
        //var_dump($triedLettersStr);

        //header('HTTP/1.1 405 Not Allowed');
        //exit('Vous n’avez pas le droit d‘exécuter cette requête');

        return compact('view','gameState', 'words', 'trials', 'replacementString', 'triedLetters', 'lettersCount', 'triedLettersStr');

    }
}