<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {

        require_once '../../conn.php';
        $conn = get_connection();

        $task_id = $_POST['id'];
        $rate = $_POST['rate'];

        //check rate includes number
        if (strpos($rate, '1') !== false) {
            $rate = 3;
        } else if (strpos($rate, '2') !== false) {
            $rate = 4;
        } else if (strpos($rate, '3') !== false) {
            $rate = 5;
        }

        $sql = "UPDATE task SET status = ? WHERE task_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ii', $rate, $task_id);
        $stmt->execute();

        //check affected rows
        if ($stmt->affected_rows > 0) {
            $result = array(
                'status' => 'success',
                'message' => 'Đánh giá thành công'
            );
        } else {
            $result = array(
                'status' => 'error',
                'message' => 'Đánh giá thất bại'
            );
        }

        die(json_encode($result));
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>