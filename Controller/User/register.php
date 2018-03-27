<?php

    require '../../Model/user.php';

    if (isset($_POST['nameuser']) and isset($_POST['password']) and isset($_POST['bloodgroup']) and isset($_POST['nameuser']))
    {
        $user = new user($_POST['nameuser'], $_POST['phoneuser'], $_POST['password'], $_POST['bloodgroup']);
        if ($user->createUser())
        {
            echo ROOT . '/index.php?p=dashboard';
        }
        else
            echo 'Error occurred. User with same informations probably exists.';
    }