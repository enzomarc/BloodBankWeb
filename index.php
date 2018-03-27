<?php

    define('ROOT', dirname(__DIR__));
    include_once ROOT . '/BloodBankWeb/View/view.php';

    if (isset($_GET['p']))
        $p = $_GET['p'];
    else
        $p = 'home';

    ob_start();

    if ($p === 'home')
        view::load(ROOT . '/BloodBankWeb/View/Home/home.php');
    else if ($p === 'donation')
        view::load(ROOT . '/BloodBankWeb/View/Donation/donation.php');
    else if ($p === 'login' || $p === 'register')
        view::load(ROOT . '/BloodBankWeb/View/Account/login.php');
    else if ($p === 'dashboard')
        view::load(ROOT . '/BloodBankWeb/View/Account/dashboard.php');
    else
        view::load(ROOT . 'BloodBankWeb/View/' . $p . '.php');
