<?php
    /* $office = $_GET['office']; */
    
    $staffs = array();
    //25 staffs
    for ($i = 1; $i <= 25; $i++) {
        $staffs[] = array(
            'username' => $i . 'username',
        );
    }

    echo json_encode(array(
        'status' => 'success',
        'data' => $staffs
    ));
?>