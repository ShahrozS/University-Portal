<?php


session_start();

$fid = $_SESSION["id"];

require '../connection.php';


$sql = "select * from course where instructor_id = {$fid} ";

$result = mysqli_query($link,$sql);

if(mysqli_num_rows($result)>0){ 

$output = "";
    while($row = mysqli_fetch_assoc($result)){


        $output .= "<option value ='{$row["id"]}'>{$row["name"]}</option>";


        

    }

    echo $output;



}









