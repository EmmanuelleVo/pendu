<?php

define('DB_PATH', $_SERVER['DOCUMENT_ROOT'] . '/pendu-start/datas/words.sqlite');

define('MAX_TRIALS', 8);
define('PAGE_TITLE', 'Le pendu');
define('FILE_PATH', 'datas/words.txt');
define('REPLACEMENT_CHAR', '*');

define('LETTERS', [
    'a' => true,
    'b' => true,
    'c' => true,
    'd' => true,
    'e' => true,
    'f' => true,
    'g' => true,
    'h' => true,
    'i' => true,
    'j' => true,
    'k' => true,
    'l' => true,
    'm' => true,
    'n' => true,
    'o' => true,
    'p' => true,
    'q' => true,
    'r' => true,
    's' => true,
    't' => true,
    'u' => true,
    'v' => true,
    'w' => true,
    'x' => true,
    'y' => true,
    'z' => true,
]);

$data = [];
$view = 'start.php';