<?php

    define('ROOT', dirname(__DIR__) . '/../');
    require '../../Model/User/user.php';
    require '../../Helpers/CryptoHelper.php';

    if (isset($_POST['nameuser']) and isset($_POST['password']) and isset($_POST['bloodgroup']) and isset($_POST['phone']))
    {
        $user = new user($_POST['nameuser'], $_POST['phone'], Hash::Encrypt($_POST['password']), $_POST['bloodgroup']);
        var_dump($user);
        if ($user->createUser())
            header('location: login.php?phone=' . $user->GetPhone() . '&token=' . Hash::Encrypt($_POST['password']));
        else
            die('Error occurred. User with same informations probably exists.');
    }
    else
        die('Missing some informations');