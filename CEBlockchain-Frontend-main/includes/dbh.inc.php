<?php
global $conn;
if (!isset($_SESSION)) {
    session_start();
    $hostname = "35.244.118.88";
    $database = "collab";
    $username = "collab_user";
    $password = 'C7E9JqE?$y8iJs9?';

    try{
        $conn = new mysqli($hostname, $username, $password, $database);
    } catch (Exception $e) {
        die($e->getMessage());
    }

}
