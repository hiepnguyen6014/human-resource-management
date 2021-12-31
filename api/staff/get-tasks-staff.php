<?php

    $task = array();

    //100 tasks
    for ($i = 0; $i < 100; $i++) {
        $task[] = array(
            'id' => $i,
            'task_name' => 'Task ' . $i,
            'start_date' => '2017-01-01',
            'deadline' => '2017-01-01',
            'status' => '1',
            /* 'rate' => '1', */
            /* "complete_time" => "2017-01-01", */
        );
    }

    echo json_encode(array('status' => 'success', 'data' => $task));
?>