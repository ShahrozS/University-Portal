<?php
session_start();
require '../connection.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Grade Edit</title>
</head>
<body>
  
    <div class="container mt-5">



        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grade Edit 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $grade_id = mysqli_real_escape_string($link, $_GET['id']);
                            $query = "SELECT * FROM grades WHERE id='$grade_id' ";
                            $query_run = mysqli_query($link, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $grade = mysqli_fetch_array($query_run);
                                ?>
                                    <form name="stdadd" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method = "post">
                                    <input type="hidden" name="grade_id" value="<?= $grade['id']; ?>">

                                    <div class="mb-3">
                                        <label>Assignment</label>
                                        <input type="number" name="assigment" value="<?=$grade['assigment'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Quiz</label>
                                        <input type="number" name="quiz" value="<?=$grade['quiz'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Project</label>
                                        <input type="number" name="project" value="<?=$grade['project'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Mid Term</label>
                                        <input type="number" name="midterm" value="<?=$grade['midterm'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Final</label>
                                        <input type="number" name="final" value="<?=$grade['final'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Grade</label>
                                        <input type="text" name="grade" value="<?=$grade['grade'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" name="update_grade" class="btn btn-primary">
                                            Update Grade
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
   
if(isset($_POST['update_grade']))
{
    $grade_id = mysqli_real_escape_string($link, $_POST['grade_id']);

    $assigment = mysqli_real_escape_string($link, $_POST['assigment']);
    $quiz = mysqli_real_escape_string($link, $_POST['quiz']);
    $project = mysqli_real_escape_string($link, $_POST['project']);
    $midterm = mysqli_real_escape_string($link, $_POST['midterm']);
    $final = mysqli_real_escape_string($link, $_POST['final']);
    $grade = mysqli_real_escape_string($link, $_POST['grade']);
    





    $query = "UPDATE grades SET assigment=$assigment, quiz=$quiz, project=$project, midterm=$midterm , final = $final, grade = '$grade' WHERE id='$grade_id' ";
    $query_run = mysqli_query($link, $query);

    if($query_run)
    {
        header("Location: grade.php");
        exit(0);
    }
    else
    {
        echo "Cant update grade";
        exit(0);
    }

    }
}
?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>