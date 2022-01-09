<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {

        require_once '../../conn.php';
        $conn = get_connection();

        $username = $_SESSION['username'];

        $sql = "SELECT `remain_day` FROM `available_vacation_day` WHERE `username` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
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