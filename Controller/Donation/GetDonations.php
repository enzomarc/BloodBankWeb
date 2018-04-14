<?php

    require_once ROOT . 'Model/Donation/donation.php';
    require_once ROOT . 'Controller/auth.php';

    /**
     * Return an array sorted by status
     * @param array $array Array to sort
     * @return array
     */
    function OrderByStatus($array)
    {
        $sorted = array();

        foreach ($array as $value)
        {
            if (strtolower($value['donation_status']) === strtolower('waiting'))
                array_push($sorted, $value);
        }

        foreach ($array as $value)
        {
            if (strtolower($value['donation_status']) != strtolower('waiting'))
                array_push($sorted, $value);
        }

        return $sorted;
    }

    $donations = Donation::GetDonations(Auth::GetPhone());

    if ($donations != null)
    {
        foreach(OrderByStatus($donations) as $donation) {
            ?>
                <tr>
                    <td><?= htmlentities($donation['hospital_name']); ?></td>
                    <td><?= htmlentities($donation['donation_date']); ?></td>
                    <td><?= htmlentities($donation['expiration_date']); ?></td>
                    <td><?= htmlentities($donation['unit']); ?></td>
                    <td><?= htmlentities($donation['donation_status']); ?></td>
                    <?php if ($donation['donation_status'] === 'waiting') { ?>
                    <td><a href="#" class="cancel-btn" id="<?= $donation['id_donation'] ?>">Cancel</a></td>
                    <?php } else { ?>
                    <td>--------</td>
                    <?php } ?>
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