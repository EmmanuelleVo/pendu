<?php

namespace Controllers;

use Models\Game;

class Trial
{
    //
    function create() {
        $view = './views/after-trial.php';
        return compact('view');
    }

}