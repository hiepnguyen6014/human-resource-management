<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {
        require_once '../../conn.php';
        $conn = get_connection();

        $id = $_GET['id'];


        $sql = "SELECT `task_feedback`.`task_id` as `task_id`, `message`, `time`, `file`, `sender_user`, `receiver_user`, `status`";
        $sql .= " FROM `task_feedback`, `task`";
        $sql .= " WHERE `task`.`task_id` = `task_feedback`.`task_id`";
        $sql .= " AND `task`.`task_id` = ? ORDER BY `time` DESC";
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