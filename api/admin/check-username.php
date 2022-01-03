<?php
    session_start();
    $username = $_GET['username'];

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
        echo json_encode(array('status' => 'failed', 'data' => 'Username is exist.'));
    } else {
        echo json_encode(array('status' => 'success', 'data' => 'Username is available.'));
    }
?>