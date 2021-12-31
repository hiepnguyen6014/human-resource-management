<?php

    // type or search
    if (!isset($_GET['type'])) {
        die(json_encode(array('status' => 'error', 'data' => 'No search term provided.')));
    }



    $type = $_GET['type'];
    
    $task = array();

    //100 tasks
    for ($i = 0; $i < 25; $i++) {
        $task[] = array(
            'id' => $i,
            'task_name' => 'Task ' . $i,
            'start_date' => '2017-01-01',
            'deadline' => '2017-01-01',
            'status' => $type,
            /* 'rate' => '1', */
            /* "complete_time" => "2017-01-01", */
        );
    }

    echo json_encode(array('status' => 'success', 'data' => $task));
?>