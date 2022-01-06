<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {

        $username = $_GET['username'];

        //strim username
        $username = trim($username);

        //validate username no space
        if (preg_match('/\s/', $username) && !preg_match("/^[a-zA-Z0-9]+$/", $username)) {
            die(json_encode(array('status' => 'failed', 'data' => 'Tài khoản không hợp lệ.')));
        }

        require_once '../../conn.php';
        $conn = get_connection();
        
        $sql = "select `username` from `Accounts`";
        $result = $conn->query($sql);
        $warehouse_username = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $warehouse_username[] = $row['username'];
            }
        }
        //check username in warehouse
        if (in_array($username, $warehouse_username)) {
            echo json_encode(array('status' => 'failed', 'data' => 'Tài khoản đã tồn tại.'));
        } else {
            echo json_encode(array('status' => 'success', 'data' => 'Tài khoản này có thể đăng ký.'));
        }
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>