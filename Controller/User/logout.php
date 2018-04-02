<?php

    require ROOT . 'Controller/auth.php';

    try
    {
        Auth::Close();
        header('location: ' . ROOT . 'index.php?p=home');
    }
    catch (Exception $ex)
    {
        die ('Error occured : ' . $ex->getMessage());
    }