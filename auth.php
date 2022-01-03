session_start();
    if (isset($_SESSION['type']) && $_SESSION['type'] == 0) {

    }
    else {
        echo json_encode(array('status' => 'error', 'message' => 'You are not authorized to access this page' . $_SESSION['type']));
    }