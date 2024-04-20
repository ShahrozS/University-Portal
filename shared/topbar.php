<?php 

$role = $_SESSION["role"];
//these are dynamic links
$home = "";
$attendance = "";
$grade = "";
$editprofile="";

if($role == "student" ){
    $home = "dashboard.php";
   $attendance = "attendance.php";
   $grade = "grades.php";
   $editprofile = "editprofile.php";

}else if($role == "faculty"){
    $home = "dashboard.php";
    $attendance = "attendance.php";
    $grade = "grade.php";
    $editprofile = "editprofile.php";
}


?>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
  <a class="navbar-brand" href="<?= $home ?>">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
       
        <li class="nav-item">
          <a class="nav-link" href="<?= $attendance ?>">Attendance</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $grade ?>">Grade</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $editprofile ?>">Edit Profile</a>
        </li>
      </ul>

    </div>
    <button class="btn btn-danger" href="login.php"><a href="../login.php">Logout!</a></button>

  </div>
</nav>



