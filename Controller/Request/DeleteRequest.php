<?php

    define('ROOT', dirname(__DIR__) . '/../');
    require_once ROOT . 'Model/Request/request.php';
    require_once ROOT . 'Controller/auth.php';

    if (Auth::Connected() && isset($_POST['id']))
    {
        if (Request::Exist($_POST['id']))
        {
            if (Request::DeleteRequest($_POST['id']))
                echo 'Success';
            else
                echo 'Error during delete.';
        }
        else
            echo "Request doesn't exist.";
    }
    else
        echo 'Error occured : Connect before donate and verify request to delete.';