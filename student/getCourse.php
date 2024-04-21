<?php

session_start();

require '../connection.php';
if(isset($_SESSION['id'])){
    $uid = $_SESSION["id"];
 }else{
     header("Location: lcoalhost:3000/login.php");
 }
$sql = "select * from course where id in (select cid from student_course where uid = {$uid}) ";

$result = mysqli_query($link,$sql);

$output = "";

if(mysqli_num_rows($result)>0){



while($row=mysqli_fetch_assoc($result)){




    $output .= "<button class='btn text-white btn-outline-light me-2' type='button' id='coursebutton' value ='{$row["id"]}'> {$row["name"]} </button>";

}

echo $output;


}else{
    echo "No result ";
}

