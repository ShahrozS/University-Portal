<?php
session_start();
require '../connection.php';
?>

<?php
include '../shared/validation.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>course Edit</title>
</head>
<body>
  
    <div class="container mt-5">



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>course Edit 
                            <a href="dashboard.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $course_id = mysqli_real_escape_string($link, $_GET['id']);
                            $query = "SELECT * FROM user WHERE id='$course_id' ";
                            $query_run = mysqli_query($link, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $course = mysqli_fetch_array($query_run);
                                ?>
                                    <form name="stdadd" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
                                    <input type="hidden" name="course_id" value="<?= $course['id']; ?>">

                                    <div class="mb-3">
                                        <label>course First Name</label>
                                        <input type="text" name="firstname" value="<?=$course['firstname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>course last name</label>
                                        <input type="text" name="lastname" value="<?=$course['lastname'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>course Username</label>
                                        <input type="text" name="username" value="<?=$course['username'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>course Password</label>
                                        <input type="text" name="password" value="<?=$course['password'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_course" class="btn btn-primary">
                                            Update course
                                        </button>
                                    </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php


if($_SERVER["REQUEST_METHOD"] == "POST"){
   
if(isset($_POST['update_course']))
{
    $course_id = mysqli_real_escape_string($link, $_POST['course_id']);

    $firstname = mysqli_real_escape_string($link, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($link, $_POST['lastname']);
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = mysqli_real_escape_string($link, $_POST['password']);

    $query = "UPDATE user SET firstname='$firstname', lastname='$lastname', username='$username', password='$password' WHERE id='$course_id' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        header("Location: dashboard.php");
        exit(0);
    }
    else
    {
        echo "Cant update course";
        exit(0);
    }

    }
}
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>