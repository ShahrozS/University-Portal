<?php

require '../connection.php';


if(isset($_POST["facultyaddbtn"])){


    $ffirstname = $_POST["ffirstname"];
    
    $flastname = $_POST["flastname"];
    
    $fusername = $_POST["fusername"];
    
    $fpassword = $_POST["fpassword"];


    if(empty("$ffirstname")){
        echo "Enter first name";
    }
    if(empty("$flastname")){
        echo"Enter lastname";
    }
    if(empty("$fusername")){
        echo"Enter username";
    }
    if(empty("$fpassword")){
        echo "Enter password";
    }

    if(!empty("$flastname") && !empty("$ffirstname") && !empty("$fusername") && !empty("$fpassword") ){
        
        $sql = "INSERT INTO user (firstname,lastname,username,password,role) VALUES (?,?,?,?,?)";
        $faculty = "faculty";
        if($stmt=mysqli_prepare($link,$sql)){

            mysqli_stmt_bind_param($stmt,"sssss",$ffirstname,$flastname,$fusername,$fpassword,$faculty);
            
           

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                header("Location: http://localhost:3000/admin/dashboard.php");
                exit;
            }
            else{
                echo "faculty cant be added";
            }
   
        }   

    }

}