<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        require_once '../../conn.php';
        $conn = get_connection();
        $username = $_POST['username'];
        $salary = $_POST['salary'];
        $sql = "update `profiles` set `salary` = ? where `username` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $salary, $username);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            die(json_encode(array("status" => "success", "message" => "Thay đổi lương thành công")));
        }else {
            die(json_encode(array("status" => "error", "message" => "Lương nhân viên không thay đổi")));
        }
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>