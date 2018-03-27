<?php

    require '../../Model/user.php';
    require 'session.php';

    if (isset($_POST['phone']) && isset($_POST['password']))
    {
        if (user::IsValid($_POST['phone'], $_POST['password']))
        {
            
            header('location: ../../index.php?p=dashboard');
        }
    }