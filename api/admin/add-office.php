<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        // check post length
        if (count($_POST) == 5) {
            require_once '../../conn.php';

            $conn = get_connection();
            $name = $_POST['name'];
            $code = $_POST['code'];
            $room = $_POST['room'];
            $phone = $_POST['phone'];
            $description = $_POST['description'];

            $sql = "INSERT INTO `offices` (`name`, `code`, `room_number`, `phone`, `description`) VALUES (?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssss', $name, $code, $room, $phone, $description);
            $stmt->execute();

            // check if office was added
            if ($stmt->affected_rows > 0) {
                echo json_encode(array('status' => 'success', 'message' => 'Đã thêm phòng ban thành công'));
            }
            else {
                echo json_encode(array('status' => 'error', 'message' => 'Mã phòng ban đã tồn tại'));
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