<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        if (count($_POST) == 2) {
            $office = $_POST['office'];
            $new = $_POST['new'];

            require_once '../../conn.php';
            $conn = get_connection();

            $sql = "UPDATE `profiles` SET `position` = 2 WHERE `office_code` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $office);
            $stmt->execute();



            // check row affected
                $sql = "UPDATE `profiles` SET `position` = 1 WHERE `username` = ?";
                $stmt1 = $conn->prepare($sql);
                $stmt1->bind_param('s', $new);
                $stmt1->execute();
    
                echo json_encode(array('status' => 'success', 'message' => 'Thay đổi thành công'));

        }
        else {
            echo json_encode(array('status' => 'error', 'message' => 'Dữ liệu không hợp lệ'));
        }
        
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
    

?>