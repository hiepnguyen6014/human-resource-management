<?php
    session_start();

    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {
        require_once '../../conn.php';
        $conn = get_connection();

        $sql = "select `code` as id, `name` from `offices`";
        $result = $conn->query($sql);
        $offices = array();
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $offices[] = $row;
            }
            echo json_encode(array('status' => 'success', 'data' => $offices));
        }
    }
    else{
        echo json_encode(array('status' => 'error', 'message' => 'You are not authorized to access this page'));
    }
?>