<?php

    define('ROOT', dirname(__DIR__) . '/../');
    require_once ROOT . 'Model/Donation/donation.php';
    require_once ROOT . 'Controller/auth.php';

    if (Auth::Connected() && isset($_POST['hospital']) && isset($_POST['unit']))
    {
        if (!Donation::Waiting(User::GetID(Auth::GetPhone())))
        {
            $today = date('Y-m-d');
            $xpiration = date_create($today)->add(new DateInterval('P10D'));
            $expiration = date_format($xpiration, 'Y-m-d');
            $donation = new Donation(Auth::GetPhone(), $_POST['hospital'], $today, $_POST['unit']);
            $donation->SetExpiration($expiration);
            $donation->SetStatus('waiting');

            if($donation->MakeDonation())
                echo 'Success';
            else
                echo 'Error';
        }
        else
            echo "You have waiting donation. Please complete the current donation before make another donation.";
    }
    else
        echo 'Error occured : Connect before donate and verify hospital and units value.';