<?php

require '../connection.php';

if(isset($_POST['delete_register']))
{
    $id = mysqli_real_escape_string($link, $_POST['delete_register']);

    $query = "DELETE FROM student_course WHERE id='$id' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        header("Location: dashboard.php");
        exit(0);
    }
    else
    {
        echo "Cant delete";
        exit(0);
    }
}


?>