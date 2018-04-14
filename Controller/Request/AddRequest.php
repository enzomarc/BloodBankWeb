<?php

    define('ROOT', dirname(__DIR__) . '/../');
    require_once ROOT . 'Model/Request/request.php';
    require_once ROOT . 'Controller/auth.php';

    if (Auth::Connected() && isset($_POST['hospital']) && isset($_POST['unit']))
    {
        if (!Request::Waiting(User::GetID(Auth::GetPhone())))
        {
            $today = date('Y-m-d');
            $request = new Request(Auth::GetPhone(), $_POST['hospital'], $today, $_POST['unit']);
            $request->SetStatus('waiting');

            if($request->MakeRequest())
                echo 'Success';
            else
                echo 'Error';
        }
        else
            echo "You have waiting request. Please complete the current request before make another request.";
    }
    else
        echo 'Error occured : Connect before donate and verify hospital and units value.';