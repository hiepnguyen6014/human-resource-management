<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 2) {
            // type or search
    if (!isset($_GET['type'])) {
        die(json_encode(array('status' => 'error', 'data' => 'Không có tham số type')));
    }


    $type = $_GET['type'];
    $username = $_SESSION['username'];
    
    $task = array();

    require_once '../../conn.php';
        $conn = get_connection();
        if ($type == -1) {
            $sql = "SELECT `task_id` as `id`, `title` as `task_name`, `deadline`, `status`, `date_begin` as `start_date` FROM `task`";
            $sql .= "WHERE `username` = ? ORDER BY `date_begin` DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $username);
        }else {
            $sql = "SELECT `task_id` as `id`, `title` as `task_name`, `deadline`, `status`, `date_begin` as `start_date` FROM `task`";
            $sql .= "WHERE `username` = ? AND `status` = ? ORDER BY `date_begin` DESC";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $username, $type);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $tasks = array();
        while ($row = $result->fetch_assoc()) {
            $tasks[] = $row;
        }
        echo json_encode(array("status" => "success", "data" => $tasks));
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>