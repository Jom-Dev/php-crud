<?php
    include 'database.php';

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $skill = $_POST['skill'];
        $date = date("Y-m-d h:i:s A");

        $db = new database();
        $db->insert('pokemon', ['name'=>$name, 'skill'=>$skill, 'created'=>$date]);
        if ($db == true) {
            header('location:index.php');
        }
    }
?>