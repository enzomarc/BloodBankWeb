<?php

    require_once 'auth.php';

    if (!isset($_GET['p']) && !Auth::Connected())
        header('location: \BloodBankWeb\index.php');

    if (!isset($_GET['p']) && Auth::Connected())
        header('location: \BloodBankWeb\index.php?p=dashboard');

    if (isset($_GET['page']))
    {
        if ($_GET['page'] === 'login')
            header('location: \BloodBankWeb\index.php?p=login');
    }