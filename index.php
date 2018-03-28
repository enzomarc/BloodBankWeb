<?php

    define('ROOT', dirname(__DIR__));
    include_once 'View/view.php';
    include_once 'Controller/auth.php';

    if (isset($_GET['p']))
        $p = $_GET['p'];
    else
        $p = 'home';

    ob_start();

    if ($p === 'home')
        view::load('View/Home/home.php');
    else if ($p === 'donation')
        view::load('View/Donation/donation.php');
    else if ($p === 'login' || $p === 'register')
    {
        if (Auth::Connected())
            view::load('View/Account/dashboard.php');
        else
            view::load('View/Account/login.php');
    }
    else if ($p === 'dashboard')
        if (Auth::Connected())
            view::load('View/Account/dashboard.php');
        else
            view::load('View/Account/login.php');
    else
        view::load('View/' . $p . '.php');
