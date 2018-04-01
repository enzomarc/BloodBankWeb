<?php

    define('ROOT', realpath(__DIR__) . '/', true);
    include_once ROOT . 'View/view.php';
    include_once ROOT . 'Controller/auth.php';

    if (isset($_GET['p']))
        $page = $_GET['p'];
    else
        $page = 'home';

    if ($page === 'home')
        view::load(ROOT . 'View/Home/home.php');
    else if ($page === 'donation')
        view::load(ROOT . 'View/Donation/donation.php');
    else if ($page === 'login' || $page === 'register')
    {
        if (Auth::Connected())
            view::load(ROOT . 'View/User/Dashboard/index.php');
        else
            view::load(ROOT . 'View/User/login.php');
    }
    else if ($page === 'dashboard')
        if (Auth::Connected())
            view::load(ROOT . 'View/User/Dashboard/index.php');
        else
            view::load(ROOT . 'View/User/login.php');
    else if ($page === 'logout')
        if (Auth::Connected())
            view::load(ROOT . 'Controller/User/logout.php');
        else
            view::load(ROOT . 'View/Home/home.php');
    else
        view::load(ROOT . 'View/' . $page . '.php');
