<?php

    require_once ROOT . 'Model/hospital_request.php';
    require_once ROOT . 'Helpers/StringHelpers.php';

    $requests = HospitalRequest::GetHospitalRequests(true);

    if ($requests != null)
    {
        foreach ($requests as $request) {
            ?>
                <tr>
                    <td><?= htmlentities($request['date']); ?></td>
                    <td><?= htmlentities($request['hospital_name']); ?></td>
                    <td><?= htmlentities(StringHelpers::FormatBloodGroup($request['bloodgroup'])); ?></td>
                    <td><a href="index.php?p=donate&id=<?= $request['id'] ?>" class="">Donate</a></td>
                </tr>
            <?php
        }
    }