<?php

    if (!isset($_GET['id'])) {
        die(json_encode(array(
            'status' => 'error',
            'data' => 'No id specified'
        )));
    }
    $id = $_GET['id'];
        $vacations = array(
            'id' => 1,
            'send_at' => date('Y-m-d', strtotime('+' . $id . ' days')),
            'date_off' => date('Y-m-d', strtotime('+' . $id . ' days')),
            'number_off' => rand(1, 10),
            'description' => 'Vacation day ' . $id,
            'status' => 'pending',
            'feedback' => '',
            'reason' => '',
            'file' => 'default.jpg',
        );

    echo json_encode(array('status' => 'success', 'data' => $vacations));

?>