<?php

    require dirname(__DIR__) . '/auth.php';

    try
    {
        Auth::Close();
        header('location: ' . dirname(__DIR__) . '/index.php');
    }
    catch (Exception $ex)
    {
        die ('Error occured : ' . $ex->getMessage());
    }