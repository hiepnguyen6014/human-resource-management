<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {
        require_once '../../conn.php';
        $conn = get_connection();

        $sql = "SELECT `task_id` as `id`, `username`, `title` as `task_name`, `date_begin` as `deadline`, `status` FROM `task` ORDER BY `date_begin` DESC";
        $stmt = $conn->prepare($sql);
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