<?php
    include '../config/database.php';

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $skill = $_POST['skill'];
        $date = date("Y-m-d h:i:s A");

        $db = new database();
        $db->update('pokemon', ['name'=>$name, 'skill'=>$skill, 'updated'=>$date], "id='$id'");
        if ($db == true) {
            header('location:../index.php');
        }
    }
?>>