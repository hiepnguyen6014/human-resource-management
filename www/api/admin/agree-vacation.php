<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');
    if (!isset($_POST['id'])) {
        die(json_encode(array(
            'status' => 'error',
            'data' => 'No id specified'
        )));
    }
    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        require_once '../../conn.php';
        $conn = get_connection();

        $vacation_id = $_POST['id'];

        $sql = "UPDATE `vacation` SET `status` = '2', `feedback` = 'OK' WHERE vacation_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$vacation_id);
        $stmt->execute();
        
        $sql = "SELECT `number_day_off`,`username` from `vacation` where `vacation_id` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$vacation_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $username = $row['username'];
        $number_day_off = $row['number_day_off'];

        $sql = "UPDATE `available_vacation_day` set `remain_day` = `remain_day` - ? WHERE `username` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is',$number_day_off,$username);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            $result = array(
                'status' => 'success',
                'message' => 'Đã duyệt yêu cầu nghỉ phép'
            );
        } else {
            $result = array(
                'status' => 'error',
                'message' => 'Đã từ chối yêu cầu nghỉ phép'
            );
        }

        echo json_encode($result);
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>