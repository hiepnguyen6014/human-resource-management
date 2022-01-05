<?php

    // type or search
    if (!isset($_GET['search']) || !isset($_GET['status'])) {
        die(json_encode(array('status' => 'error', 'data' => 'Không có tham số type')));
    }

    $status = $_GET['status'];
    $search = $_GET['search'];
    
    $task = array();

    require_once '../../conn.php';
        $conn = get_connection();
        
        $search = "%$search%";
        if ($status == -1) {
            $sql = "SELECT `task_id` as `id`, `username`, `title` as `task_name`, `date_begin` as `deadline`, `status` FROM `task` WHERE";
            $sql .= "`title` LIKE ? ORDER BY `date_begin` DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $search);
        }else {
            $sql = "SELECT `task_id` as `id`, `username`, `title` as `task_name`, `date_begin` as `deadline`, `status` FROM `task` WHERE `status` = ?";
            $sql .= " AND `title` LIKE ? ORDER BY `date_begin` DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $status, $search);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $tasks = array();
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
        echo json_encode(array("status" => "success", "data" => $tasks));
?>