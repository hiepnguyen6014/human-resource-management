<?php
    $vacations = array();

    // create 100 vacation days
    for ($i = 0; $i < 100; $i++) {
        $vacations[] = array(
            'id' => $i,
            'seen' => rand(0, 1),
            'username' => 'user' . $i,
            'send_at' => date('Y-m-d', strtotime('+' . $i . ' days')),
            'date_off' => date('Y-m-d', strtotime('+' . $i . ' days')),
            'status' => 'pending',
            'office' => 'Vacation day ' . $i
        );
    }

    echo json_encode(array('status' => 'success', 'data' => $vacations));

?>