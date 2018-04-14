<?php

    define('ROOT', dirname(__DIR__) . '/../');
    require_once ROOT . 'Model/Donation/donation.php';
    require_once ROOT . 'Controller/auth.php';

    if (Auth::Connected() && isset($_POST['id']))
    {
        if (Donation::Exist($_POST['id']))
        {
            if (Donation::DeleteDonation($_POST['id']))
                echo 'Success';
            else
                echo 'Error during delete.';
        }
        else
            echo "Donation doesn't exist.";
    }
    else
        echo 'Error occured : Connect before donate and verify donation to delete.';