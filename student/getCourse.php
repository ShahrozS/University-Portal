<?php

session_start();

require '../connection.php';
$uid = $_SESSION["id"];
$sql = "select * from student_course where uid = {$uid} ";

$result = mysqli_query($link,$sql);

$output = "";

if(mysqli_num_rows($result)>0){



while($row=mysqli_fetch_assoc($result)){

    $output .= "<button class='btn btn-outline-success me-2' type='button' id='coursebutton' value = '{$row["id"]} '>{$row["name"]}</button>";

}

echo $output;


}else{
    echo "No result ";
}

