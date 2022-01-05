<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 2) {
        require_once '../../conn.php';
        $conn = get_connection();

        $id = $_GET['id'];


        $sql = "SELECT `task_id`, `message`, `time`, `file`, `sender_user`, `receiver_user` FROM `task_feedback` WHERE `task_id` = ? ORDER BY `time` DESC";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        $tasks_feedback = array();
        while ($row = $result->fetch_assoc()) {
            $tasks_feedback[] = $row;
        }
        echo json_encode(array("status" => "success", "data" => $tasks_feedback));
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>