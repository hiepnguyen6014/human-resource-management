<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        if (isset($_GET['id'])) {
            require_once '../../conn.php';

            $conn = get_connection();

            $id = $_GET['id'];

            $sql = "SELECT * FROM `offices` WHERE `code` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $id);
            $stmt->execute();

            $result = $stmt->get_result();
            $row = $result->fetch_assoc();

            echo json_encode(array('status' => 'success', 'data' => $row));
            
        }
        else {
            echo json_encode(array('status' => 'error', 'message' => 'Dữ liệu không hợp lệ'));
        }
        
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
    

?>