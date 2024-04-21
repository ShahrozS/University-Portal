<?php 
if(isset($_SESSION['role'])){
    $role = $_SESSION["role"];
 }else{
     header("Location: http://localhost:3000/login.php");
 }
//these are dynamic links

$grade = "";
$attendancetext="";
$gradetext = "";


if($role == "student" ){

    $attendancetext="Check your attendance by selecting enrolled course!";
    $gradetext = "Check your grades by selecting enrolled course!";
   $grade = "grades.php";


}else if($role == "faculty"){

    $attendancetext="Mark attendance by selecting the course you teach!";
    $gradetext = "Mark grades by selecting the course you teach!";
    $grade = "grade.php";

}


?>

<div style="display: flex; height:80vh; justify-content: center; align-items: center;">

<div style="display:flex; padding: 15px; gap:40px;">
<div class="card text-bg-dark p-2"  style="width: 18rem;">
  <h2 class="card-header display-5">Attendance</h2>
  <div class="card-body">
    <p class="card-text h4"><?= $attendancetext ?></p>
    <a href="attendance.php" class="btn btn-primary">Attendance -></a>
  </div>
  </div>
  <div class="card text-bg-dark p-2"  style="width: 18rem;">
  <h2 class="card-header display-5">Grades</h2>
  <div class="card-body">
    <p class="card-text h4"><?= $gradetext ?>.</p>
    <a href="<?= $grade ?>" class="btn btn-primary">Grades -></a>
  </div>
  </div>

  <div class="card text-bg-dark p-2"  style="width: 18rem; height:20rem;">
  <h2 class="card-header display-5">Edit Your Profile</h2>
  <div class="card-body">
    <p class="card-text h4">Edit your profile details.</p>
    <a href="editprofile.php" class="btn btn-primary">Go somewhere</a>
  </div>

</div>

</div>