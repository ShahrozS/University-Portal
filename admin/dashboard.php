
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>









<div class="student">

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Details</h4>
                </div>
                <div class="card-body">
                    <table class="table" id="studenttable">

                    </table>

                    <div class="add">
                        <form name="stdadd" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
                    
                        
                        <input type="text" name="sfirstname" placeholder="First Name">

                        <input type="text" name="slastname" placeholder="Last Name">

                        <input type="text" name="susername" placeholder="Username">

                        <input type="text" name="spassword" placeholder="Password">

                        <button name="stdaddbtn" class="btn btn-primary">Add Student!</button>

                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

</div>

<div class="course">

</div>

<div class="faculty">

</div>


<?php


?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>

$(document).ready(function(){

    function getStdDet(){
        $.ajax({
            url:'getstd.php',
            method:'GET',
            success: function(res){
                $('#studenttable').html(res);
            }
        })
    }

    getStdDet();

})


    </script>

<?php


require '../connection.php';


if($_SERVER["REQUEST_METHOD"] == "POST"){
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
            
            $sql = "INSERT INTO user (firstname,lastname,username,password,role) VALUES (?,?,?,?)";
            $student = "student";
            if($stmt=mysqli_prepare($link,$sql)){
    
                mysqli_stmt_bind_param($stmt,"sssss",$firstname,$lastname,$username,$password,$student);
                
                $param_name = $name1;
                $param_instructor=$instructor1;
    
                if(mysqli_stmt_execute($stmt)){
                    // echo"\n Course Name: ".$name1." Course Instructor: ".$instructor1."\n";
                    header("Location: " . $_SERVER['PHP_SELF']);
                }
    
            
            }   
    



        }
        


    }
}


?>








</body>
</html>