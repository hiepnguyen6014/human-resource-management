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
            'username' => 'user' . $id,
            'send_at' => date('Y-m-d', strtotime('+' . $id . ' days')),
            'date_off' => date('Y-m-d', strtotime('+' . $id . ' days')),
            'number_off' => rand(1, 10),
            'office' => 'Vacation day ' . $id,
            'description' => 'Vacation day ' . $id,
            'status' => 'pending',
            'file' => 'default.jpg',
        );

    echo json_encode(array('status' => 'success', 'data' => $vacations));

?>