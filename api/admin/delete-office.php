<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        if (count($_POST) == 1) {
            require_once '../../conn.php';

            $conn = get_connection();

            $room = $_POST['room'];
            
            $sql = "DELETE FROM `offices` WHERE `code` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $room);
            $stmt->execute();

            // check affected rows
            if ($stmt->affected_rows > 0) {
                die(json_encode(array('status' => 'success', 'message' => 'Xóa phòng ban thành công')));
            }
            else {
                die(json_encode(array('status' => 'error', 'message' => 'Bạn chỉ có thể xóa phòng ban chưa có nhân viên')));
            }
            
        }
        else {
            echo json_encode(array('status' => 'error', 'message' => 'Dữ liệu không hợp lệ'));
        }  
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
    

?>