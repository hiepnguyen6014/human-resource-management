<?php

    // type or search
    if (!isset($_GET['type'])) {
        die(json_encode(array('status' => 'error', 'data' => 'No search term provided.')));
    }



    $type = $_GET['type'];
    
    $vacations = array();
    for ($i = 0; $i < 25; $i++) {
        $vacations[] = array(
            'id' => $i . '-' . $type,
            'seen' => rand(0, 1),
            'username' => 'user' . $type,
            'send_at' => date('Y-m-d', strtotime('+' . $i . ' days')),
            'date_off' => date('Y-m-d', strtotime('+' . $i . ' days')),
            'status' => $type,
        );
    }

    echo json_encode(array('status' => 'success', 'data' => $vacations));
?>