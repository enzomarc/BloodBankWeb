<?php

    require_once ROOT . 'Model/Donation/donation.php';
    require_once ROOT . 'Controller/auth.php';

    $donations = Donation::GetDonations(Auth::GetPhone());

    if ($donations != null)
    {
        foreach ($donations as $donation) {
            ?>
                <tr>
                    <td><?= htmlentities($donation['hospital_name']); ?></td>
                    <td><?= htmlentities($donation['donation_date']); ?></td>
                    <td><?= htmlentities($donation['unit']); ?></td>
                </tr>
            <?php
        }
    }
    else
    {
        ?>
            <div>
                <h5>Aucune donation</h5>
            </div>
        <?php
    }