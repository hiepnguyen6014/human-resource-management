<?php 
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        if (isset($_POST['id'])) {
            require_once '../../conn.php';
            $conn = get_connection();
            $username = $_POST['id'];
            $sql = "delete from `available_vacation_day` where `username` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s',$username);
            $stmt->execute();


            $sql = "delete from `Profiles` where `username` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s',$username);
            $stmt->execute();

            $sql = "delete from `Accounts` where `username` = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s',$username);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                die(json_encode(array("status" => "success", "message" => "Xóa nhân viên thành công."))) ;
            } else {
                die(json_encode(array("status" => "error", "message" => "Xóa nhân viên thất bại.")));
            }
        }
        else{
            die(json_encode(array("status" => "error", "message" => "Dữ liệu không hợp lệ")));
        }
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>