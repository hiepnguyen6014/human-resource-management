<?php


    session_start();
    if (isset($_SESSION['type'])) {
        require_once '../conn.php';
        $conn = get_connection();
        
        $pos = '1';
        $sql = "select vacation_id,`start_date`,vacation.username,`name`,`seen`,`status` from `vacation`,`profiles`,`offices`
        where vacation.username = profiles.username and profiles.office_code = offices.code and profiles.position = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('i',$pos);
        $stmt->execute();

        $result = $stmt->get_result(); 
        
        $vacations = array();
        if($result->num_rows > 0){
            while($rows = $result->fetch_assoc()) {
                $vacations[] = array(
                    'id' => $rows['vacation_id'],
                    'seen' => $rows['seen'],
                    'send_at' => $rows['start_date'],
                    'username' => $rows['username'],
                    'office' => $rows['name'],
                    'date_off' => $rows['start_date'],
                    'status' => $rows['status']
                );
            }
        }
        echo json_encode(array('status' => 'success', 'data' => $vacations));

    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'You are not authorized to access this page'));
    } 
?>