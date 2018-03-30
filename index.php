<?php

    define('ROOT', dirname(__DIR__));
    include_once 'View/view.php';
    include_once 'Controller/auth.php';

    if (isset($_GET['p']))
        $page = $_GET['p'];
    else
        $page = 'home';

    if ($page === 'home')
        view::load('View/Home/home.php');
    else if ($page === 'donation')
        view::load('View/Donation/donation.php');
    else if ($page === 'login' || $page === 'register')
    {
        if (Auth::Connected())
            view::load('View/User/dashboard.html');
        else
            view::load('View/User/login.php');
    }
    else if ($page === 'dashboard')
        if (Auth::Connected())
            view::load('View/User/dashboard.html');
        else
            view::load('View/User/login.php');
    else
        view::load('View/' . $page . '.php');
