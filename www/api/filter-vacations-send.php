<?php
     session_start();

     if (!isset($_GET['type'])) {
         die(json_encode(array('status' => 'error', 'data' => 'No search term provided.')));
     }
 
     if (isset($_SESSION['type'])) {
         require_once '../conn.php';
         $conn = get_connection();
         
         $search = $_GET['type'];
         $username = $_SESSION['username'];

        if($search == 6){
            $sql = "select vacation_id,`start_date`,`number_day_off`,`seen`,`status` from `vacation`
            where vacation.username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $username);
            $stmt->execute();
        }
        else{
            $sql = "select vacation_id,`start_date`,`number_day_off`,`seen`,`status` from `vacation`
            where vacation.username = ? and status = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ss', $username, $search);
            $stmt->execute();
        }

        $result = $stmt->get_result(); 
        
        $vacations = array();
        if($result->num_rows > 0){
            while($rows = $result->fetch_assoc()) {
                $vacations[] = array(
                    'id' => $rows['vacation_id'],
                    'seen' => $rows['seen'],
                    'send_at' => $rows['start_date'],
                    'date_off' => $rows['start_date'],
                    'number_off' => $rows['number_day_off'],
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