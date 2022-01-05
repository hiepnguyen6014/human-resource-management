<?php
    session_start();
    require_once ('../conn.php');
    $conn = get_connection();
    $username = $_SESSION['username'];

    $sql = "SELECT SUM(`number_day_off`) AS `number_day` from `vacation` WHERE username = ? and status = 2";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_assoc();

    $Sum_off = $rows['number_day'];

    $sql = "SELECT `remain_day` FROM `available_vacation_day` WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_assoc();

    $remain_day = $rows['remain_day'];
    $Available_off_day = $remain_day - $Sum_off;

    $sql = "SELECT `start_date` from `vacation` WHERE username = ? and status = 2 ORDER BY `start_date` DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_assoc();

    $latest_date = $rows['start_date'];

    $sql = "SELECT `vacation_id` from `vacation` WHERE username = ? and status = 2 ORDER BY `vacation_id` DESC LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s',$username);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_assoc();

    $latest_id = $rows['vacation_id'];

    $data = [
        'id' => $latest_id,
        'lastest_off_date' => $latest_date,
        'available_off_date' => $Available_off_day,
    ];

    die(json_encode(array('status' => 'success', 'data' => $data)));
?>