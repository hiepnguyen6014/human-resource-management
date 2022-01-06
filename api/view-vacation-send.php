<?php

    session_start();
    if (!isset($_GET['id'])) {
        die(json_encode(array(
            'status' => 'error',
            'data' => 'No id specified'
        )));
    }

    if (isset($_SESSION['type'])) {
        require_once '../conn.php';
        $conn = get_connection();

        $vacation_id = $_GET['id'];

        $sql = "SELECT `vacation_id`,vacation.username,`start_date`,`number_day_off`,`reason`,`file`,`seen`,`status`,`name`,`feedback`
         from `vacation`,`profiles`,`offices`
        WHERE vacation.username = profiles.username and profiles.office_code = offices.code and vacation_id = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$vacation_id);
        $stmt->execute();

        $result = $stmt->get_result();

        $vacations = array();

        if($result->num_rows > 0){
            while($rows = $result->fetch_assoc()){
                $vacations = array(
                    'id' => $rows['vacation_id'],
                    'send_at' => $rows['start_date'],
                    'description' => $rows['reason'],
                    'office' => $rows['name'],
                    'username' => $rows['username'],
                    'feedback' => $rows['feedback'],
                    'date_off' => $rows['start_date'],
                    'number_off' => $rows['number_day_off'],
                    'file' => $rows['file'],
                    'status' => $rows['status']
                );
            }
        }else{
            echo json_encode(array('status' => 'error', 'message' => 'khong co gi'));
        }

        echo json_encode(array('status' => 'success', 'data' => $vacations));
 
     }
     else {
         echo json_encode(array('status' => 'error', 'message' => 'You are not authorized to access this page'));
     }

?>