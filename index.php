<?php
session_start();

if (!isset($_SESSION['username'])) {
    $host = 'http://'.$_SERVER['HTTP_HOST'];
        header("Location: /login.php");

}

echo $_SESSION['username'];
?>