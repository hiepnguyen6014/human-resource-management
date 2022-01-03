<?php
    
    if (isset($_POST['username'])) {
        require_once '../../conn.php';
        $conn = get_connection();
        $username = $_POST['username'];
        
        $sql = "update `Accounts` set `password` = ? where `username` = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $username);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            echo "success";
            die(json_encode(array("status" => "success", "data" => "Reset password successfully.")));
        }
    }
    die(json_encode(array("status" => "error", "data" => "Reset password failed.")));
?>