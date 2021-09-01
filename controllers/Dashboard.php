<?php

namespace Controllers;

use Models\Game;

class Dashboard
{
    function index()
    {
        $gameState = 'start';
        $gameModel = new Game();
        $words = $gameModel->all();
        $wordsCount = count($words);
        $view = './views/start.php';

        setcookie('wordIndex', rand(0, $wordsCount - 1), time() + 3600);
        //var_dump($_COOKIE['wordIndex']);
        $_SESSION['letters'] = LETTERS;
        $letters = $_SESSION['letters'];
        foreach ($words as $word) { // mot au hazard
            //$wordName = $word->word;
            if ($word->id === $_COOKIE['wordIndex']) {
                $_SESSION['word'] = strtolower($word->word);
                var_dump($_COOKIE['wordIndex'], $_SESSION['word']);

                $lettersCount = strlen($_SESSION['word']); // compter le nombre de lettres du mot
                $replacementString = str_pad('', $lettersCount, REPLACEMENT_CHAR);
            }
        }
        $trials = 0;
        $triedLetters = [];

        return compact('gameState', 'view', 'words', 'letters', 'trials', 'replacementString', 'triedLetters', 'lettersCount');

    }



    function store()
    {        $view = './views/start.php';

        $gameState = 'start';

        var_dump($_SESSION['word']);

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

        return compact('view','gameState', 'trials', 'replacementString', 'triedLetters', 'lettersCount', 'triedLettersStr');

    }



}