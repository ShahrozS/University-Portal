<?php

require '../connection.php';


if(isset($_POST["courseaddbtn"])){


    $name = $_POST["cname"];
    
    $faculty_id = $_POST["fid"];
    



    if(empty("$name")){
        echo "Enter Course name";
    }
    if(empty("$faculty_id")){
        echo"Enter Faculty ID";
    }
   

    if(!empty("$name") && !empty("$faculty_id") ){
        
        $sql = "INSERT INTO course (name,instructor_id) VALUES (?,?)";
        
        if($stmt=mysqli_prepare($link,$sql)){

            mysqli_stmt_bind_param($stmt,"si",$name,$faculty_id);
            
           

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                header("Location: http://localhost:3000/admin/dashboard.php");
                exit;
            }
            else{
                echo "Course cant be added";
            }
   
        }   

    }

}