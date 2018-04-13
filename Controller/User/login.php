<?php

    define('ROOT', dirname(__DIR__) . '/../');
    require '../../Model/User/user.php';
    require '../../Helpers/CryptoHelper.php';
    require '../auth.php';

    if (isset($_POST['phone']) && isset($_POST['password']))
    {
        if (user::IsValid($_POST['phone'], Hash::Encrypt($_POST['password'])))
        {
            $username = User::GetByPhone($_POST['phone'])->GetUsername();
            Auth::Create($username, $_POST['phone']);
            header('location: ../../index.php?p=dashboard');
        }
        else
        {
            die('Username or password is incorrect.');
        }
    }
    else if (isset($_GET['phone']) && isset($_GET['token']))
    {
        if (user::IsValid($_GET['phone'], $_GET['token']))
        {
            $username = User::GetByPhone($_GET['phone'])->GetUsername();
            Auth::Create($username, $_GET['phone']);
            header('location: ../../index.php?p=dashboard');
        }
        else
        {
            die('Username or password is incorrect.');
        }
    }
    else
    {
        die('Incorrect credentials');
    }