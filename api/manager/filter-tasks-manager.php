<?php

    // type or search
    if (!isset($_GET['type'])) {
        die(json_encode(array('status' => 'error', 'data' => 'Không có tham số type')));
    }



    $type = $_GET['type'];
    
    $task = array();

    require_once '../../conn.php';
        $conn = get_connection();

        if ($type == -1) {
            $sql = "SELECT `task_id` as `id`, `username`, `title` as `task_name`, `date_begin` as `deadline`, `status` FROM `task` ORDER BY `date_begin` DESC";
            $stmt = $conn->prepare($sql);
        }else {
            $sql = "SELECT `task_id` as `id`, `username`, `title` as `task_name`, `date_begin` as `deadline`, `status` FROM `task` WHERE `status` = ? ORDER BY `date_begin` DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $type);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $tasks = array();
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
        echo json_encode(array("status" => "success", "data" => $tasks));
?>