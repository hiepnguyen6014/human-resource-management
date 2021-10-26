<?php
    if (isset($_POST['username'])) {

    }
    else {
        $host = 'http://'.$_SERVER['HTTP_HOST'];
        header("Location: $host/login.php");
        die();      
    }

?>