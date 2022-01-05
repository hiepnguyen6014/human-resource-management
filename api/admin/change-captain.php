<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        if (count($_POST) == 2) {
            $office = $_POST['office'];
            $new = $_POST['new'];

            require_once '../../conn.php';
            $conn = get_connection();

            //check current captain
            $sql = "SELECT `position` FROM `profiles` WHERE `username` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $new);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            if ($row['position'] == 1) {
                die(json_encode(array('status' => 'error', 'message' => 'Người này đã là trưởng phòng')));
            }
            $sql = "select `username` from `profiles` where `office_code` = ? and `position` = 1";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $office);
            $stmt->execute();
            $result = $stmt->get_result();
            $old = $result->fetch_assoc();


            $sql = "UPDATE `profiles` SET `position` = 2 WHERE `office_code` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $office);
            $stmt->execute();

            // check row affected
            $sql = "UPDATE `profiles` SET `position` = 1 WHERE `username` = ?";
            $stmt1 = $conn->prepare($sql);
            $stmt1->bind_param('s', $new);
            $stmt1->execute();

            $sql = "Update `accounts` set `account_type` = 2 where `username` = ?";
            $stmt2 = $conn->prepare($sql);
            $stmt2->bind_param('s', $old);
            $stmt2->execute();

            $sql = "Update `accounts` set `account_type` = 1 where `username` = ?";
            $stmt3 = $conn->prepare($sql);
            $stmt3->bind_param('s', $new);
            $stmt3->execute();
            

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