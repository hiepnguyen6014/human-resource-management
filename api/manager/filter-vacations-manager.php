<?php
     session_start();

     if (!isset($_GET['type'])) {
         die(json_encode(array('status' => 'error', 'data' => 'No search term provided.')));
     }
 
     if (isset($_SESSION['type'])) {
        require_once '../../conn.php';
        $conn = get_connection();
        
        $status = $_GET['type'];
        $search = $_GET['search'];

        $username = $_SESSION['username'];
        $sql = "select `office_code` from `profiles` where username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();

        $result = $stmt->get_result();
        $rows = $result->fetch_assoc();

        $office_code = $rows['office_code'];

        if($status == 6){
            $sql = "select vacation_id,`start_date`,vacation.username,`name`,`seen`,`status`,`number_day_off` from `vacation`,`profiles`,`offices`
            where vacation.username = profiles.username and profiles.office_code = ? and profiles.office_code = offices.code and profiles.position = 2";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('s', $office_code);
            $stmt->execute();
        }
        else{
            $sql = "select vacation_id,`start_date`,vacation.username,`name`,`seen`,`status`,`number_day_off` from `vacation`,`profiles`,`offices`
            where vacation.username = profiles.username and profiles.office_code = ?
             and profiles.office_code = offices.code and profiles.position = 2 and status = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('si',$office_code, $status);
            $stmt->execute();
        }

        $result = $stmt->get_result(); 
        
        $vacations = array();
        if($result->num_rows > 0){
            while($rows = $result->fetch_assoc()) {
                $vacations[] = array(
                    'id' => $rows['vacation_id'],
                    'seen' => $rows['seen'],
                    'username' => $rows['username'],
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