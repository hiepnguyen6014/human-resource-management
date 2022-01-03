<?php
    $task = array();

    $list = array();
    for ($i = 0; $i < 3; $i++) {
        $list[] = array(
            'id' => $i,
            'message' => 'Task ' . $i,
            'time' => '2017-01-01',
            'file' => 'gai-xinh.png',
            'sender' => '',
            //dung cho can le
        );
    }

    $task[] = array(
        'id' => 1,
        'task_name' => 'Task 1',
        'username_send' => '2017-01-01',
        'deadline' => '2017-01-01',
        'status' => '1',
        'list' => $list
    );
    //nguoi gui hien tai == session
    echo json_encode(array('status' => 'success', 'data' => $task));
?>