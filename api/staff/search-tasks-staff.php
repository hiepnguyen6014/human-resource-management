<?php
    $task = array();

    $search = $_GET['search'];

    for ($i = 0; $i < 100; $i++) {
        $task[] = array(
            'id' => $i,
            'task_name' => 'Task ' . $search,
            'start_date' => '2017-01-01',
            'deadline' => '2017-01-01',
            'status' => '1',
        );
    }

    echo json_encode(array('status' => 'success', 'data' => $task));
?>