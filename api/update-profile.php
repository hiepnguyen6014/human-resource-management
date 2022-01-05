<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        require '../conn.php';
        $conn = get_connection();

        $sql = "UPDATE `profiles` SET `gmail` = ?, `phone_number` = ?, `address` = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $email, $phone, $address, $username);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            die(json_encode(array("status" => "success", "message" => "Cập nhật thông tin thành công")));
        } else {
            die(json_encode(array("status" => "error", "message" => "Không có gì thay đổi")));
        }
    

    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
    

?>