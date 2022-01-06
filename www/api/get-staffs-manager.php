<?php
    //select staff of one office by current user
    
    $staffs = array();

    //100 staffs
    for ($i = 0; $i < 100; $i++) {
        $staffs[] = array(
            'id' => $i,
            'name' => 'Staff ' . $i,
            'username' => 'user' . $i,
            'email' => 'staff' . $i . '@gmail.com',
            'phone' => '09' . $i . '1234567'
        );
    }

    echo json_encode(array('status' => 'success', 'data' => $staffs));
?>