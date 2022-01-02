<?php
    $username = $_GET['username'];

    $warehouse_username = [
        'admin',
        'warehouse',
        'warehouse2',
        'tranminhlong',
        'tranminhlong2',
    ];

    //check username in warehouse
    if (in_array($username, $warehouse_username)) {
        echo json_encode(array('status' => 'failed', 'data' => 'Username is exist.'));
    } else {
        echo json_encode(array('status' => 'success', 'data' => 'Username is available.'));
    }
?>