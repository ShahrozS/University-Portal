<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>




    <div class="container">

   




    <div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        Student Details
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div class="accordion-body">
      
                    <table class="table" id="studenttable">

                    </table>

                    <div class="add">
                        <form name="stdadd" action="addstudent.php" method="post">


                            <input type="text" name="sfirstname" placeholder="First Name">

                            <input type="text" name="slastname" placeholder="Last Name">

                            <input type="text" name="susername" placeholder="Username">

                            <input type="text" name="spassword" placeholder="Password">

                            <button name="stdaddbtn" id="stdaddbtn" class="btn btn-primary">Add
                                Student!</button>

                        </form>
                    </div>
                    <div class="edit" id="sedit">

                    </div>

                 
      
      </div>
    </div>
  </div>



  <!-- Faculty -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        Faculty Details
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
    <div class="accordion-body">
      
      <table class="table" id="facultytable">

      </table>

      <div class="add">
          <form name="facultyadd" action="addfaculty.php" method="post">


              <input type="text" name="ffirstname" placeholder="First Name">

              <input type="text" name="flastname" placeholder="Last Name">
              
              <input type="text" name="fusername" placeholder="Username">

              <input type="text" name="fpassword" placeholder="Password">

              <button name="facultyaddbtn" id="facultyaddbtn" class="btn btn-primary">Add
                  faculty!</button>

          </form>
      </div>
      <div class="edit" id="fedit">

      </div>

   

</div>
    </div>
  </div>


  <!-- Course -->
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        Courses Detail
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
    <div class="accordion-body">
      
                    <table class="table" id="coursetable">

                    </table>

                    <div class="add">
                        <form name="courseadd" action="addcourse.php" method="post">


                            <input type="text" name="cname" placeholder="Course name">

                            <input type="text" name="fid" placeholder="Faculty Id">


                            <button name="courseaddbtn" id="courseaddbtn" class="btn btn-primary">Add
                                Course!</button>

                        </form>
                    </div>
                    <div class="edit" id="cedit">

                    </div>

                 
      
      </div>
    </div>
  </div>
</div>


</div>


    <!--  JS SCRIPT HERE -->
    <script>
        $(document).ready(function () {

            // getting studnts
            function getStdDet() {

                console.log("intget")

                $.ajax({
                    url: 'getstd.php',
                    method: 'GET',
                    success: function (res) {
                        $('#studenttable').html(res);
                    }
                });
            }

            getStdDet();



            $("#stdaddbtn").on("click", function (e) {
                console.log("hii?");
                getStdDet();

            })




            // Getting Faculty
              function getFacultyDet() {

                $.ajax({
                    url: 'getfaculty.php',
                    method: 'GET',
                    success: function (res) {
                        $('#facultytable').html(res);
                    }
                });
                }

                getFacultyDet();



                $("#facultyaddbtn").on("click", function (e) {
                console.log("hii?");
                getFacultyDet();

                })



            //gertting courses

             function getCourseDet() {

            $.ajax({
                url: 'getcourse.php',
                method: 'GET',
                success: function (res) {
                    $('#coursetable').html(res);
                }
            });
            }

            getCourseDet();



            $("#courseaddbtn").on("click", function (e) {
            console.log("hii?");
            getCourseDet();

            })

            



        });
    </script>
    <!-- PHP CODE TO HANDLE FORMS  -->
    <?php

ob_start();
require '../connection.php';

// Inserting the student
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     if(isset($_POST["stdaddbtn"])){


//         $firstname = $_POST["sfirstname"];
        
//         $lastname = $_POST["slastname"];
        
//         $username = $_POST["susername"];
        
//         $password = $_POST["spassword"];


//         if(empty("$firstname")){
//             echo "Enter first name";
//         }
//         if(empty("$lastname")){
//             echo"Enter lastname";
//         }
//         if(empty("$username")){
//             echo"Enter username";
//         }
//         if(empty("$password")){
//             echo "Enter password";
//         }

//         if(!empty("$lastname") && !empty("$firstname") && !empty("$username") && !empty("$password") ){
            
//             $sql = "INSERT INTO user (firstname,lastname,username,password,role) VALUES (?,?,?,?,?)";
//             $student = "student";
//             if($stmt=mysqli_prepare($link,$sql)){
    
//                 mysqli_stmt_bind_param($stmt,"sssss",$firstname,$lastname,$username,$password,$student);
                
               
    
//                 if(mysqli_stmt_execute($stmt)){
//                     mysqli_stmt_close($stmt);
//                     mysqli_close($link);
//                     header("Location: ".$_SERVER['PHP_SELF']);
//                     exit;
//                 }
//                 else{
//                     echo "Student cant be added";
//                 }
       
//             }   
    
//         }

//     }



// //inserting the faculty


//     if(isset($_POST["facultyaddbtn"])){


//         $ffirstname = $_POST["ffirstname"];
        
//         $flastname = $_POST["flastname"];
        
//         $fusername = $_POST["fusername"];
        
//         $fpassword = $_POST["fpassword"];


//         if(empty("$ffirstname")){
//             echo "Enter first name";
//         }
//         if(empty("$flastname")){
//             echo"Enter lastname";
//         }
//         if(empty("$fusername")){
//             echo"Enter username";
//         }
//         if(empty("$fpassword")){
//             echo "Enter password";
//         }

//         if(!empty("$flastname") && !empty("$ffirstname") && !empty("$fusername") && !empty("$fpassword") ){
            
//             $sql = "INSERT INTO user (firstname,lastname,username,password,role) VALUES (?,?,?,?,?)";
//             $faculty = "faculty";
//             if($stmt=mysqli_prepare($link,$sql)){
    
//                 mysqli_stmt_bind_param($stmt,"sssss",$ffirstname,$flastname,$fusername,$fpassword,$faculty);
                
               
    
//                 if(mysqli_stmt_execute($stmt)){
//                     mysqli_stmt_close($stmt);
//                     mysqli_close($link);
//                     header("Location: ".$_SERVER['PHP_SELF']);
//                     exit;
//                 }
//                 else{
//                     echo "faculty cant be added";
//                 }
       
//             }   
    
//         }

//     }




// // inserting the course


//     if(isset($_POST["courseaddbtn"])){


//         $name = $_POST["cname"];
        
//         $faculty_id = $_POST["fid"];
        



//         if(empty("$name")){
//             echo "Enter Course name";
//         }
//         if(empty("$faculty_id")){
//             echo"Enter Faculty ID";
//         }
       

//         if(!empty("$name") && !empty("$faculty_id") ){
            
//             $sql = "INSERT INTO course (name,instructor_id) VALUES (?,?)";
            
//             if($stmt=mysqli_prepare($link,$sql)){
    
//                 mysqli_stmt_bind_param($stmt,"si",$name,$faculty_id);
                
               
    
//                 if(mysqli_stmt_execute($stmt)){
//                     mysqli_stmt_close($stmt);
//                     mysqli_close($link);
//                     header("Location: ".$_SERVER['PHP_SELF']);
//                     exit;
//                 }
//                 else{
//                     echo "Course cant be added";
//                 }
       
//             }   
    
//         }

//     }

// }

ob_end_flush(); 

?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>