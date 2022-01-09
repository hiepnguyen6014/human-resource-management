<?php
    session_start();
    header('Content-Type: application/json; charset=utf-8');

    if (isset($_SESSION['type']) && $_SESSION['type'] == 1) {

        require_once ('../../conn.php');
    $conn = get_connection();
    $username = $_SESSION['username'];

    $sql = "SELECT `remain_day` FROM `available_vacation_day` WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    //count row
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $remain_day = $row['remain_day'];
    } else {
        $remain_day = 0;
    }

    $sql = "SELECT `start_date`, `number_day_off` from `vacation` WHERE username = ? and status = 2 ORDER BY `start_date` DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    //count row
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $start_date = $row['start_date'];
        $number_day_off = $row['number_day_off'];
    } else {
        $start_date = "1/1/1970";
        $number_day_off = -1;
    }
    // add number day off to start date
    $latest_date_off = date('Y-m-d', strtotime($start_date. ' + '.$number_day_off.' days'));

    $data = array(
        'status' => 'success',
        'data' => array(
            'remain_day' => $remain_day,
            'latest_date_off' => $latest_date_off
        )
    );

    echo json_encode($data);
    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'Bạn không có quyền truy cập trang này'));
    }
?>