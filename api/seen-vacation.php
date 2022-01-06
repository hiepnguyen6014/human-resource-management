<?php
    session_start();
    if (!isset($_POST['id'])) {
        die(json_encode(array(
            'status' => 'error',
            'data' => 'No id specified'
        )));
    }

    if (isset($_SESSION['type'])) {
        require_once '../conn.php';
        $conn = get_connection();

        $vacation_id = $_POST['id'];

        $sql = "UPDATE `vacation` SET `seen` = '0' WHERE vacation_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$vacation_id);
        $stmt->execute();

        if($stmt->affected_rows > 0){
            die(json_encode(array('status'=>'success', 'message' => 'Xem thanh cong')));
        }else{
            die(json_encode(array('status'=>'error', 'message' => 'Da xem')));
        }
 
     }
     else {
         echo json_encode(array('status' => 'error', 'message' => 'You are not authorized to access this page'));
     } 
?>