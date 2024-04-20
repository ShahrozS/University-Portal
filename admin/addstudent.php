<?php

require '../connection.php';

if(isset($_POST["stdaddbtn"])){


    $firstname = $_POST["sfirstname"];
    
    $lastname = $_POST["slastname"];
    
    $username = $_POST["susername"];
    
    $password = $_POST["spassword"];


    if(empty("$firstname")){
        echo "Enter first name";
    }
    if(empty("$lastname")){
        echo"Enter lastname";
    }
    if(empty("$username")){
        echo"Enter username";
    }
    if(empty("$password")){
        echo "Enter password";
    }

    if(!empty("$lastname") && !empty("$firstname") && !empty("$username") && !empty("$password") ){
        
        $sql = "INSERT INTO user (firstname,lastname,username,password,role) VALUES (?,?,?,?,?)";
        $student = "student";
        if($stmt=mysqli_prepare($link,$sql)){

            mysqli_stmt_bind_param($stmt,"sssss",$firstname,$lastname,$username,$password,$student);
            
           

            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_close($stmt);
                mysqli_close($link);
                header("Location: http://localhost:3000/admin/dashboard.php ");
                exit;
            }
            else{
                echo "Student cant be added";
            }
   
        }   

    }

}
