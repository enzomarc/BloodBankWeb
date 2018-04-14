<?php

    require_once ROOT . 'Model/Request/request.php';
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
            if (strtolower($value['request_status']) === strtolower('waiting'))
                array_push($sorted, $value);
        }

        foreach ($array as $value)
        {
            if (strtolower($value['request_status']) != strtolower('waiting'))
                array_push($sorted, $value);
        }

        return $sorted;
    }

    $requests = Request::GetRequests(Auth::GetPhone());

    if ($requests != null)
    {
        foreach(OrderByStatus($requests) as $request) {
            ?>
                <tr>
                    <td><?= htmlentities($request['hospital_name']); ?></td>
                    <td><?= htmlentities($request['request_date']); ?></td>
                    <td><?= htmlentities($request['received_date']); ?></td>
                    <td><?= htmlentities($request['unit']); ?></td>
                    <td><?= htmlentities($request['request_status']); ?></td>
                    <?php if ($request['request_status'] === 'waiting') { ?>
                    <td><a href="#" class="req-cancel-btn" id="<?= $request['id_request'] ?>">Cancel</a></td>
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
                <h5>No Request.</h5>
            </div>
        <?php
    }