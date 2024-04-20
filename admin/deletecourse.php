<?php

require '../connection.php';

if(isset($_POST['delete_course']))
{
    $course_id = mysqli_real_escape_string($link, $_POST['delete_course']);

    $query = "DELETE FROM course WHERE id='$course_id' ";
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