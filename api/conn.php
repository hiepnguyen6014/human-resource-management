<?php

	function get_connection() {
        $conn = new mysqli('mysql-server', 'root', 'root', 'enterprise');
        return $conn;
    }

?>