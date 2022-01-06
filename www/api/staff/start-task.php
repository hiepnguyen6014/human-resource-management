<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 2) {
            // type or search
        if (!isset($_POST['task_id'])) {
            die(json_encode(array('status' => 'error', 'message' => 'Không có tham số')));
        }

        $task_id = $_POST['task_id'];
        $date = date('Y-m-d H:i:s');

        require_once '../../conn.php';
        $conn = get_connection();
        $sql = "UPDATE `task` SET `status` = '1', `assign_date` = now()  WHERE `task_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $task_id);
        $stmt->execute();

        // check if update success
        if ($stmt->affected_rows == 1) {
            die(json_encode(array('status' => 'success', 'message' => 'Nhận nhiệm vụ thành công')));
        } else {
            die(json_encode(array('status' => 'error', 'message' => 'Nhận nhiệm vụ thất bại')));
        }
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>