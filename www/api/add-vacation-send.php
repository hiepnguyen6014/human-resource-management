<?php
    session_start();
    $username = $_SESSION['username'];

    require_once ('../conn.php');
    $conn = get_connection();

    $start_date = now();
    $number_day_off = 5;
    $reason = 'avc';
    $file = 'dasd.xls';

    $sql = "INSERT INTO `vacation`(`username`, `start_date`, `number_day_off`, `reason`, `file`)
     VALUES (?,?,?,?,?) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssiss', $username, $start_date, $number_day_off, $reason, $file);
    $stmt->execute();

    // $result = $stmt->get_result();
    // $vacations = array();
    // if($result->num_rows > 0){
    //     while($rows = $result->fetch_assoc()){
    //         $vacations = array(
    //             'username' => $rows['username'],
    //             'send_at' => $rows['start_date'],
    //             'date_off' => $rows['start_date'],
    //             'number_off' => $rows['number_day_off'],
    //             'description' => $rows['reason'],
    //             'file' => $rows['file']
    //         );
    //     }
    // }

    // echo json_encode(array('status' => 'success', 'data' => $vacations));
    

?>