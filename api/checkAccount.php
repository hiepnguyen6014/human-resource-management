<?php

// Start the session
session_start();

    /* input: username, password
    output: success { status: true, type: accountType }
    output: failed { status: true, type: accountType } */

    //auto check
    $type = -1;
    if (!isset($_POST['username']) || !isset($_POST['password'])) {
        echo json_encode(array('status' => "false", 'type' => 3));
    }
    else {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $_SESSION["username"] = $username;
        
        if ($username == 'admin' && $password == 'admin') {
            $type = 0;
            echo json_encode(array('status' => true, 'type' => $type));
        }
        else if ($username == 'manager' && $password == 'manager') {
            $type = 1;
            echo json_encode(array('status' => true, 'type' => $type));
        }
        else if ($username == 'employee' && $password == 'employee') {
            $type = 2;
            echo json_encode(array('status' => true, 'type' => $type));
        }
        else echo json_encode(array('status' => false, 'type' => $type));
    }



?>