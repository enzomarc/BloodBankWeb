<?php

    define('ROOT', dirname(__DIR__) .  '/BloodBankWeb/');
    include_once ROOT . 'View/view.php';
    include_once ROOT . 'Controller/auth.php';

    $page = isset($_GET['p']) ? $_GET['p'] : 'home';

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
