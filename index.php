<?php

$start = microtime(true);

//require 'validation.php';
require 'config.php';

$words = file('datas/words.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$wordsCount = count($words);
$gameState = 'start';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    setcookie('wordIndex', rand(0, $wordsCount - 1), time() + 3600);
    //$wordIndex = rand(0, $wordsCount - 1); // mémoriser l'indice du mot
    $letters = LETTERS;
    $word = strtolower($words[$_COOKIE['wordIndex']]); // choisir un mot au hasard
    $lettersCount = strlen($word); // compter le nombre de lettres du mot
    $trials = 0;
    $triedLetters = [];
    $replacementString = str_pad('', $lettersCount, REPLACEMENT_CHAR);

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //$data = validated();
    //retrieving data from the request
    $wordIndex = $_COOKIE['wordIndex']; // récupérer l'index
    $letters = unserialize(urldecode($_COOKIE['letters']));
    // ==> $letters = json_decode($_COOKIE['letters'], true);

    $triedLetter = $_POST['triedLetter'];


    // Calcul des nouvelles valeurs du state
    $letters[$triedLetter] = false;
    $word = strtolower($words[$wordIndex]);
    $triedLetters = array_filter($letters, fn($bool) => !$bool);
    $trials = count(array_filter(array_keys($triedLetters), fn($l) => !str_contains($word, $l)));
    $lettersCount = strlen($word);
    $replacementString = str_pad('', $lettersCount, REPLACEMENT_CHAR);
    //setting new values
    $letterFound = false;
    //$triedLetters .= $triedLetter;


    //checking if letter is in word
    for ($i = 0; $i < $lettersCount; $i++) {
        $replacementString[$i] = array_key_exists($word[$i],$triedLetters) ? $word[$i] : REPLACEMENT_CHAR;
        if ($triedLetter === substr($word, $i, 1)) {
            $letterFound = true;
        }
    }
    if (!$letterFound) {
        if (MAX_TRIALS <= $trials) {
            $gameState = 'lost';
        }
    } else {
        if ($word === $replacementString) {
            $gameState = 'win';
        }
    }

} else {
    header('HTTP/1.1 405 Not Allowed');
    exit('Vous n’avez pas le droit d‘exécuter cette requête');
}
$serializedLetters = urlencode(serialize($letters)); // en get et en post
setcookie('letters', urlencode(serialize($letters)), time() + 3600);
// ==> setcookie('letters', json_encode($letters), time() + 3600);
$triedLettersStr = implode(', ', array_keys($triedLetters));

require 'views/start.php';

$end = microtime(true);
$renderTime = ($end - $start) * 1000;
printf('Rendu de la page en %.6f milisecondes', $renderTime); //6 décimales
