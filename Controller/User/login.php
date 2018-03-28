<?php

    require '../../Model/user.php';
    require '../auth.php';

    if (isset($_POST['phone']) && isset($_POST['password']))
    {
        if (user::IsValid($_POST['phone'], $_POST['password']))
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
    else
    {
        die('Incorrect credentials.');
    }