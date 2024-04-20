<?php

require '../connection.php';


if(isset($_POST["registeraddbtn"])){


    $uid = $_POST["uid"];
    $cid = $_POST["cid"];
    

    if(empty("$uid")){
        echo "Enter  Userid";
    }
    if(empty("$cid")){
        echo"Enter CourseID";
    }
    

    if(!empty("$cid") && !empty("$uid") ){
        
        $sql = "INSERT INTO student_course (uid,cid) VALUES (?,?)";
        if($stmt=mysqli_prepare($link,$sql)){

            mysqli_stmt_bind_param($stmt,"ii",$uid,$cid);
            
           

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                header("Location: http://localhost:3000/admin/dashboard.php");
                exit;
            }
            else{
                echo "Registeration cant be added";
            }
   
        }   

    }

}