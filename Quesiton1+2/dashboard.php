<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<style>

.main{
    width:500px;
    height : 600px;

    background-color:whitesmoke;

    padding:3px;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;

    
}

input{
    border-radius:24px;
    outline:none;
    padding:5px;


}

button{
    background-color:black;
    color:white;
    border-radius:5px;
    padding:3px;
    margin-top:6px;

}

select{
    background-color:black;
    color:white;
    border-radius:5px;
    padding:3px;
    width:90px;

    margin-top:6px;
}
form{
    display:flex;
    flex-direction:column;

    padding:5px;
    width:300px;
}

</style>
<body>

    <div class="main">

        <div class="heading">

        </div>

        <div class="users">

            <button id="load">Load Users</button>

            <div id="table">

            </div>

        </div>


        <div class="addUser">

            <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>' method="post">

                <label for="username">Enter a username</label>
                <input type="text" name="username" id="username">

                <label for="password">Enter Password</label>
                <input type="text" name="password" id="password">

                <label for="role">select a role</label>
                <select name="role">

                    <option value="admin">Admin</option>
                    <option value="doctor">Doctor</option>
                    <option value="patient">Patient</option>

                    </select>

                    <button type="submit" name="submit1">Add!</button>


            </form>

        </div>


        <div class="deleteUser">

            <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>' method="post">

                <label for="id">Enter ID you want to delete:</label>
                <input type="text" name="id" id="id">

                <button type="submit" name="submit2">Delete!</button>
            </form>
        </div>



        <div class="updateUser">


            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method ="post">

             <label for="id2">Enter id you want to update:</label>
             <input type="text" name="id2" id="id2">

             <label for="username2">New username(leave blank if same)</label>
                <input type="text" name="username2" id="username2">

            
             <label for="password2">New password(leave blank if same)</label>
             <input type="text" name="password2" id="password2">
            
             <select name="role2">
                <option value="" selected>Keep same</option>
                <option value="admin">Admin</option>
                <option value="doctor">Doctor</option>
                <option value="patient">Patient</option>
                
               </select>


               <button type="submit" name="submit3">Update!</button>



             </form>

        </div>


    </div>


    <?php 

$link = mysqli_connect("localhost","root","","user1") ;

if(!$link){
    die("Failed to connect");
}

if($_SERVER["REQUEST_METHOD"] == "POST" ){

    echo "Hellow";

    if(isset($_POST["submit1"]))
    {

        $username   =   $_POST["username"]; 
        $password   =   $_POST["password"];
        $role       =   $_POST["role"];

    
        if(!empty($username) && !empty($password) && !empty($role)){

        $sql = "Insert into user1 (username,password,role) values (? , ? , ? )";

        if($stmt = mysqli_prepare($link,$sql)){

            mysqli_stmt_bind_param($stmt,"sss",$username,$password,$role);

        
            if( mysqli_stmt_execute($stmt)){
                echo"Account Added!";
            }

        }

    }
   
    }

    if(isset($_POST["submit2"])){

        $id = $_POST["id"];
        
        if(empty($id)){
            echo "Please enter id";
        }else{

            if($id!=1){

            
            $sql = "delete from user1 where id = ?";

            if($stmt = mysqli_prepare($link,$sql)){
                mysqli_stmt_bind_param($stmt , "i",$id);

                
                if($result = mysqli_stmt_execute($stmt)){
                    echo " Record deleted succesfully! ";
                }
            }



        }
        else{
            echo "Cant delete yourself";
        }
    }
    }

    if(isset($_POST["submit3"])){

        $id2 = $_POST["id2"];
        if(empty($id2)){
            echo "Please enter id";
        }
        else{

            $sql2 = "select * from user1 where id = ?";

            $fetchedusername = "";
            $fetchedpassword = "";
            $fetchedrole = "";

            if($stmt = mysqli_prepare($link,$sql2)){
                mysqli_stmt_bind_param($stmt,"i",$id2);

                if( mysqli_stmt_execute($stmt)){

                    $result = mysqli_stmt_get_result($stmt);
                    
                    if(mysqli_num_rows($result)>0){
                        $row = mysqli_fetch_assoc($result);

                        $fetchedpassword = $row["password"]; 
                        $fetchedusername = $row["username"];
                        $fetchedrole     = $row["role"];

                    }else{
                        echo "Id not found";
                    }
                }

            }

            $username = $_POST["username2"];
            $password = $_POST["password2"];
            $role = $_POST["role2"];

            if(empty($username)){
                $username = $fetchedusername;
            }
            if(empty($password)){
                $password = $fetchedpassword;
            }
            if(empty($role)){
                $role = $fetchedrole;
            }

            $sql3 = "UPDATE user1 set username = ? , password = ? , role = ? where id = ?";

            if($stmt = mysqli_prepare($link,$sql3)){

                mysqli_stmt_bind_param($stmt,"sssi",$username,$password,$role,$id2);

                if(mysqli_stmt_execute($stmt)){
                    echo "Record updated!! Load more to see.";
                }
            }

            else{
                die("failed to prepare");
            }



        }


    }


    
}





?>


    <script>
        
        $(document).ready(function () {

            $("#load").on("click", function (e) {
                console.log("Hellow");

                $.ajax ({

                    url: 'load.php',
                    type: 'post',
                    success: function (data) {

                        $("#table").html(data);

                    },


                });

            })



        });
    </script>
</body>

</html>