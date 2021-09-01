<?php

return [
    ['method' => 'GET',
        'action' => '',
        'resource' => '',
        'controller' => 'Dashboard',
        'callback' => 'index'
    ],

    ['method' => 'POST',
        'action' => 'store',
        'resource' => 'game',
        'controller' => 'Dashboard',
        'callback' => 'store'
    ],

    /*['method' => 'POST',
        'action' => 'store',
        'resource' => 'game',
        'controller' => 'Trial',
        'callback' => 'store'
    ],*/
    /*['method' => 'GET',
        'action' => 'view',
        'resource' => 'game',
        'controller' => 'Trial',
        'callback' => 'create'
    ],*/

    ['method' => 'POST',
        'action' => 'check',
        'resource' => 'login',
        'controller' => 'Login',
        'callback' => 'check'
    ],
    ['method' => 'POST',
        'action' => 'logout',
        'resource' => 'user',
        'controller' => 'Login',
        'callback' => 'delete'
    ],
    ['method' => 'GET',
        'action' => 'view',
        'resource' => 'login-form',
        'controller' => 'Login',
        'callback' => 'create'
    ],

    ['method' => 'POST',
        'action' => 'store',
        'resource' => 'user',
        'controller' => 'Register',
        'callback' => 'store'
    ],
    ['method' => 'GET',
        'action' => 'view',
        'resource' => 'register-form',
        'controller' => 'Register',
        'callback' => 'create'
    ],
];