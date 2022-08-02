<?php
    include '../config/database.php';
    $id = $_POST['id'];
    $db = new database();
    $db->delete('pokemon',"id='$id'");
?>