<?php

    require_once ROOT . 'Model/Hospital/hospital.php';
    require_once ROOT . 'Model/User/user.php';
    require_once ROOT . 'Controller/auth.php';

    class Hospital_Helper
    {

        /**
         * Sort an specified array by a specified city
         * @param array $array Array to sort
         * @param string $city City to use for array sorting
         * @return array
         */
        public static function OrderByCity($array, $city)
        {
            $sorted = array();

            foreach ($array as $value)
            {
                if (strtolower($value['hospital_city']) === strtolower($city))
                    array_push($sorted, $value);
            }

            foreach ($array as $value)
            {
                if (strtolower($value['hospital_city']) != strtolower($city))
                    array_push($sorted, $value);
            }

            return $sorted;
        }

    }

    $hospitals = Hospital::GetHospitals();

    if ($hospitals != null)
    {
        $hospitals = Auth::Connected() ? Hospital_Helper::OrderByCity($hospitals, User::GetByPhone(Auth::GetPhone())->GetCity()) : $hospitals;
        foreach ($hospitals as $hospital) {
            ?>
                <tr>
                    <td><?= htmlentities($hospital['hospital_name']); ?></td>
                    <td><?= htmlentities($hospital['hospital_city']); ?></td>
                    <td><a class="donate-btn" id="<?= $hospital['ref_hospital']; ?>" href="#">Donate</a></td>
                </tr>
            <?php
        }
    }