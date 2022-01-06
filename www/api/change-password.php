<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $current_password = $_POST['old-password'];
        $new_password = $_POST['new-password'];

        require '../conn.php';
        $conn = get_connection();
        // check if current password is correct
        $sql = "SELECT password FROM `accounts` WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if (password_verify($current_password, $result['password'])) {
            //check if new password is not the same as current password
            if ($current_password == $new_password) {
                die(json_encode(array("status" => "error", "message" => "Mật khẩu mới không được giống với mật khẩu cũ")));
            }


            $sql = "UPDATE `accounts` SET `password` = ? WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $new_password = password_hash($new_password, PASSWORD_BCRYPT);
            $stmt->bind_param("ss", $new_password, $username);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                die(json_encode(array("status" => "success", "message" => "Cập nhật mật khẩu thành công")));
            }
        } else {
            die(json_encode(array("status" => "error", "message" => "Mật khẩu hiện tại không đúng")));
        }
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>