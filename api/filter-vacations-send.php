<?php
    if (!isset($_GET['type'])) {
        die(json_encode(array('status' => 'error', 'data' => 'No type term provided.')));
    }

    $type = $_GET['type'];
    
    $vacations = array();
    for ($i = 0; $i < 25; $i++) {
        $vacations[] = array(
            'id' => $i . '-' . $type,
            'seen' => rand(0, 1),
            'send_at' => date('Y-m-d', strtotime('+' . $i . ' days')),
            'date_off' => date('Y-m-d', strtotime('+' . $i . ' days')),
            'number_off' => rand(1, 5),
            'status' => $type,
        );
    }

    echo json_encode(array('status' => 'success', 'data' => $vacations));
?>