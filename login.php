<?php
// Admin login details is alread in database username: admin password: admin
// Only admin can assign every other user credentials. 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>

body{
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: whitesmoke;
    flex-direction: column;
    height: 100vh;
}

.main{
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;

}
.card{
    width:500px;
    height:300px;
    border-radius: 50px;
    
    background-color: gainsboro;

    padding:10px;
    display: flex;
    flex-direction: column;

    align-items: center;

}

h1{
    font-weight: 40px;
    font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

input{

    outline: none;
    border-radius: 8px;
    height: 20px;

    padding:6px;
    border: none;
    margin-top: 5px ;
    margin-bottom:5px;
}
label{
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
form{
    display: flex;
    flex-direction:column;
    width: 400px;
}

p{
    font-size: 10px;
    color: gray;

}

button{

    outline: none;
    padding: 4px;
    border-radius: 5px;
    background-color: black;
    color:white;
    cursor: pointer;
    margin-top: 15px;
}

h4{
    font-weight: 20px;
    color: red;
}

h3{
    font-weight: 20px;
    color: green;
}

#role{
    outline: none;
    border:none;
    border-radius: 5px ; 
    
    color:white;
    background:black;
    padding:5px;
    margin-top: 5px;


}

</style>
<body>

<div class="main">




<div class="card">


<div class="heading">
    
<h1>Login Page</h1>
</div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

<label for="username">Username</label>
<input type="text" id="username" name="username">


<label for="password">Password</label>
<input type="password" name="password" id="password">


<Select name="role" id="role">
    <option value="admin">Admin</option>
    
    <option value="student">Student</option>
    
    <option value="faculty">Faculty</option>

</Select>

<button type="submit" name="submit">Login</button>


</form>


</div>



<?php

include("connection.php");

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"]))
{


    $username = $_POST["username"];
    $password = $_POST["password"];
    if(empty($username)){
        echo "<br>Username Empty";
    }
    if(empty($password)){
        echo "<br>Password Empty";
    }

    $role = $_POST["role"];
    $sql = "Select * from user where username = ? ";

    if($stmt = mysqli_prepare($link,$sql)){

        mysqli_stmt_bind_param($stmt,"s",$username);

        if( mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) > 0){

                $row = mysqli_fetch_assoc($result);

                if($username == $row["username"] && $password == $row["password"] && $role == $row["role"]){


                    session_start();

                    $_SESSION["username"] = $username;
                    $_SeSSION["password"] = $password;

                    if($row["role"] == "admin"){
                    $url = "admin/dashboard.php";
                    header('Location: '.$url);
                    }
                    else if($row["role"] == "faculty"){
                        $url = "faculty/dashboard.php";
                        header('Location: '.$url);
                    }
                    else if($row["role"] == "student"){
                        $url = "student/dashboard.php";
                        header('Location: '.$url);
                    }
                
                }
                else{

                    if($role != $row["role"]){
                        echo "<br>You cant login as ".$role;
                        echo "<br>Kindly login as ".$row["role"];
                    }
                    else{
                    echo "<br>Username or password is incorrect ";
                    }
                }
                

            }


        }else{
            echo"username doesnt exist";
        }

    }
    else{
        echo"Failed to prepare";
    }


}







?>



</div>
</body>
</html>