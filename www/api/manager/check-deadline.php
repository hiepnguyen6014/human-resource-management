<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {
        $task_id = $_POST['id_task'];

        require_once ('../../conn.php');
        $conn = get_connection();

        $sql = "SELECT deadline FROM task WHERE task_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $task_id);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $deadline = $row['deadline'];

        $sql1 = "SELECT `time` FROM task_feedback WHERE task_id = ? order by `time` desc limit 1";
        $stmt1 = $conn->prepare($sql1);
        $stmt1->bind_param('i', $task_id);
        $stmt1->execute();

        $result1 = $stmt1->get_result();
        $row1 = $result1->fetch_assoc();
        $last_time = $row1['time'];

        //com

        die(json_encode(array('status' => 'success', 'message' => $last_time > $deadline)));
    }

    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>