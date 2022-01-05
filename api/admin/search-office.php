<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        if (isset($_GET['search'])) {
            require_once '../../conn.php';

            $conn = get_connection();
            $search = $_GET['search'];
            // lowercase search
            $search = strtolower($search);
            // check search in office
            $sql = "SELECT `office_id`, `code`, `name`, `room_number` as room, `phone` FROM `offices` WHERE `code` LIKE ? OR `name` LIKE ? OR `room_number` LIKE ? OR `phone` LIKE ?";
            $stmt = $conn->prepare($sql);
            $search = "%$search%";
            $stmt->bind_param("ssss", $search, $search, $search, $search);
            $stmt->execute();
            
            $offices = array();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $offices[] = $row;
            }
            echo json_encode(array("status" => "success", "data" => $offices));
            
        }
        else {
            echo json_encode(array('status' => 'error', 'message' => 'Dữ liệu không hợp lệ'));
        }
        
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>