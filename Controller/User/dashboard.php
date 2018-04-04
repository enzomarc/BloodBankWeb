<?php

    require_once ROOT . 'Controller/auth.php';
    require_once ROOT . 'Model/User/user.php';

    if (Auth::Connected())
    {
        $current_user = User::GetByPhone(Auth::GetPhone());

        $username = $current_user->GetUsername();
        $phone = $current_user->GetPhone();
        $bloodgroup = $current_user->GetBloodGroup();
        $birthdate = $current_user->GetBirthdate();
        $gender = $current_user->GetGender();
        $city = $current_user->GetCity();
        $avatar = $current_user->GetAvatar();
        $date = date('Y-m-d');
    }