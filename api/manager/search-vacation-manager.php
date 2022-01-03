<?php

    // type or search
    if (!isset($_GET['search'])) {
        die(json_encode(array('status' => 'error', 'data' => 'No search term provided.')));
    }



    $search = $_GET['search'];
    
    $vacations = array();
    for ($i = 0; $i < 25; $i++) {
        $vacations[] = array(
            'id' => $i . '-' . $search,
            'seen' => rand(0, 1),
            'username' => 'user' . $search,
            'send_at' => date('Y-m-d', strtotime('+' . $i . ' days')),
            'date_off' => date('Y-m-d', strtotime('+' . $i . ' days')),
            'status' => 'pending',
        );
    }

    echo json_encode(array('status' => 'success', 'data' => $vacations));
?>