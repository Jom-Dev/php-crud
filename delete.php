<?php
    include 'database.php';

    $id = $_POST['id'];

    $db = new database();
    $db->delete('data',"id='$id'");
?>