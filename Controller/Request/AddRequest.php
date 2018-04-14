<?php

    define('ROOT', dirname(__DIR__) . '/../');
    require_once ROOT . 'Model/Request/request.php';
    require_once ROOT . 'Controller/auth.php';

    if (Auth::Connected() && isset($_GET['hospital']))
    {
        if (!Request::Waiting(User::GetID(Auth::GetPhone())))
        {
            $today = date('Y-m-d');
            $request = new Request(Auth::GetPhone(), $_GET['hospital'], $today);
            $request->SetStatus('waiting');

            if($request->MakeRequest())
                header('location: ../../index.php?p=dashboard&v=requests');
            else
                die('Error occured while making request.');
        }
        else
            echo "You have waiting request. Please complete the current request before make another request.";
    }
    else
        echo 'Error occured : Connect before donate and verify hospital and units value.';