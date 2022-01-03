
<?php

    /* $id = $_SESSION['username']; */

    $data = [
        'id' => 1,
        'lastest_off_date' => '2021-12-25',
        'available_off_date' => 10,
    ];

    echo json_encode(array('status' => 'success', 'data' => $data));
?>