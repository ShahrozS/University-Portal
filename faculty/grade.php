<?php session_start();
    ?>

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
<div class="heading">

<h1 class="display-2">GRADES</h1>

</div>
<?php
include '../shared/topbar.php';
?>
<div class="main">
<div class="container">
<div class="courses">
    
<div class="courselist">
    <nav class="navbar bg-dark mt-4 border-bottom border-body p-2 rounded-3 pt-2 pb-2">

  <div class="container-fluid justify-content-start" id="courselist">
</div>
</nav>
</div>

</div>



<table class="table  table-striped" id="gradetable">



</table>


</div>

<div id="extra">

</div>



</div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

<script>

$(document).ready(function(){







// generate Course
function getCourses(){
        console.log("hi");
        $.ajax({
                    url: 'getCourseG.php',
                    method: 'GET',
                    success: function (res) {
                        $('#courselist').html(res);
                    }
                });
    }

    getCourses();

    $(document).on("click", "#coursebutton", function(e) {
        var id = $(this).val();
        console.log(id);
        $.ajax({
       url: 'generateGrades.php',
       method: 'GET',
       data : {id:id},
       success: function (res) {
           $('#gradetable').html(res);
       }
   });
})
})





</script>

</body>

</html>