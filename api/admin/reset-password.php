<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        if (isset($_POST['username'])) {
            require_once '../../conn.php';
            $conn = get_connection();
            $username = $_POST['username'];
            $password = password_hash($username, PASSWORD_BCRYPT);
            $sql = "update `accounts` set `password` = ? where `username` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $password, $username);
            $stmt->execute();
    
            if($stmt->affected_rows > 0){
                die(json_encode(array("status" => "success", "message" => "Khởi tạo mật khẩu thành công")));
            }
        }
        die(json_encode(array("status" => "error", "message" => "Đổi mật khẩu thất bại")));
        
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>