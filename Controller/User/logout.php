<?php

    require '../auth.php';

    try
    {
        Auth::Close();
        header('location: ../../index.php');
    }
    catch (Exception $ex)
    {
        die ('Error occured : ' . $ex->getMessage());
    }