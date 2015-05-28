<?php
    error_reporting(E_ALL);
    // dÃ©marre la session
    session_start();
    require_once('model/Bdd.php');
    // charge le fichier des fonctions PHP
    require_once('model/Twitter.php');
    require_once('model/Message.php');
    // require_once('function.php');

    // Liste blanche, c'est notre routing qui correspont Ã  nos pages
    $routing = [
        'home' => [
            'controller' => 'home',
            'secure'=> false
            ],
        'registration' => [
            'controller' => 'registration',
            'secure' => false
            ],
        'profil' => [
            'controller' => 'profil',
            'secure'=> true
            ],
        'login' => [
            'controller' => 'login',
            'secure' => false
            ],
        'logout' => [
        'controller' => 'logout',
        'secure' => false
        ],
        '404' => [
            'controller' => '404',
            'secure' => false
            ],
    ];

    // verifions la pertinance de la page en GET
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        if (!isset($routing[$page])) {
            // la page n'existe pas
            $page = '404';
        }
    } else {
        //page par defaut
        $page = 'home';
    }

    //check pour la sÃ©curitÃ©
    if ($routing[$page]['secure'] === true && !isset($_SESSION['user'])) {
        //Met en session un message informatif
        addMessageFlash('info', 'Veuillez-vous connecter afin d\'acceder a cette page');
        //redirection
        header("location: index.php?page=login");
        exit;
    }

    // Charge la page demandÃ©e
    $fileController = 'view/'.$routing[$page]['controller'] . '.php';
    if (file_exists($fileController)) {
        include($fileController);
    } else {
        echo 'File is missing';
    }