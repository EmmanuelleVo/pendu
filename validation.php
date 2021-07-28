<?php

function validated():array
{
    if (!ctype_alpha($_POST['triedLetter'])) { //si ce ne sont pas que des lettres
        return ['error' => 'Ceci n’est pas une lettre de l’alphapbet.'];
    }
    if(!array_key_exists($_POST['triedLetter'], LETTERS)) {
        return ['error' => 'Ce n’est pas une des lettres disponibles'];
    }

}

