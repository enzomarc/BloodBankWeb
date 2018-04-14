<?php

    require_once ROOT . 'Model/hospital_request.php';
    require_once ROOT . 'Helpers/StringHelpers.php';
    require_once ROOT . 'Controller/auth.php';

    function SortByBloodGroup($array, $bloodgroup)
    {
        $sorted = array();

        foreach ($array as $value)
        {
            if (strtolower($value['bloodgroup']) === strtolower($bloodgroup))
                array_push($sorted, $value);
        }

        foreach ($array as $value)
        {
            if (strtolower($value['bloodgroup']) != strtolower($bloodgroup))
                array_push($sorted, $value);
        }

        return $sorted;
    }

    $requests = HospitalRequest::GetHospitalRequests(true);
    $requests = SortByBloodGroup($requests, Auth::GetBloodGroup());

    if ($requests != null)
    {
        foreach ($requests as $request) {
            ?>
                <tr id="<?= $request['id']; ?>">
                    <td><?= htmlentities($request['date']); ?></td>
                    <td><?= htmlentities($request['hospital_name']); ?></td>
                    <td><?= htmlentities(StringHelpers::FormatBloodGroup($request['bloodgroup'])); ?></td>
                    <td class="unit-td"><input type="number" min="1" max="<?= $request['unit'] ?>" value="1"></td>
                    <td><a href="#" class="hospital-donate-btn">Donate</a></td>
                </tr>
            <?php
        }
    }