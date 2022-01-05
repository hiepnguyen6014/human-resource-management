<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        if (count($_POST) == 5) {
            require_once '../../conn.php';

            $conn = get_connection();

            $id = $_POST['id'];
            $name = $_POST['name'];
            $room = $_POST['room'];
            $phone = $_POST['phone'];
            $description = $_POST['description'];
            
            $sql = "UPDATE `offices` SET `name` = ?, `room_number` = ?, `phone` = ?, `description` = ? WHERE `code` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('sssss', $name, $room, $phone, $description, $id);
            $stmt->execute();

            // check affected rows
            if ($stmt->affected_rows > 0) {
                die(json_encode(array('status' => 'success', 'message' => 'Cập nhật thành công')));
            }
            else {
                die(json_encode(array('status' => 'error', 'message' => 'Cập nhật thất bại')));
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