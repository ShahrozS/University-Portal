<?php


session_start();

if(isset($_SESSION['id'])){
   $fid = $_SESSION["id"];
}else{
    header("Location: localhost:3000/login.php");
}
require '../connection.php';


$sql = "select * from course where instructor_id = {$fid} ";

$result = mysqli_query($link,$sql);

if(mysqli_num_rows($result)>0){ 

$output = "";
    while($row = mysqli_fetch_assoc($result)){


        $output .= "<button class='btn btn-outline-light  text-whiteme-2' type='button' id='coursebutton' value ='{$row["id"]}'> {$row["name"]} </button>";


        

    }

    echo $output;



}









