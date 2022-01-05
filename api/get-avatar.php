<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['username'])) {
        require '../conn.php';
        $conn = get_connection();
        $username = $_SESSION['username'];
        $sql = "SELECT avatar FROM profiles WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        if ($result->num_rows > 0) {
            $row = mysqli_fetch_assoc($result);
            $avatar = $row['avatar'];
            echo json_encode(array('status' => 'success', 'avatar' => $avatar));
        } else {
            echo json_encode(array('status' => 'success', 'avatar' => 'default.webp'));
        }

    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
    

?>