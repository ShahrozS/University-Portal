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
<style>

body{
  
}

  .form{
   
  }

</style>


<body>

<div class="main">
<div class="heading">

<h1 class="display-2">ATTENDANCE</h1>

</div>

<?php
include '../shared/topbar.php';
?>

<div class="container">

<div class="form">


<div class="input-group mb-3 mt-3">
  <span class="input-group-text bg-dark text-white " id="inputGroup-sizing-default">Lecture Number</span>
  <input name="lectureno" id="lectureno" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>


<select id="courseselect" name="courseselect" id="courseselect" class="form-select mb-3 mt-3" aria-label="Default select example">
<option selected>Open to select a course</option>


</select>


<div class="input-group mb-3">
  <span class="input-group-text  bg-dark text-white " id="inputGroup-sizing-default">Date</span>
  <input name="date" id="date" name="lectureno" id="lectureno" type="date" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
</div>



</div>

<button class="btn btn-lg btn-primary" name="generate" id="generate">Generate Attendance!</button>


<button class = "btn btn-lg btn-success " name="" id="save">Save!</button>


<table class="table  table-striped" id="attendance">



</table>




<div id="extra">

</div>



</div>

</div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

<script>

$(document).ready(function(){


    //generating select options for course

    function generateCourse(){

        $.ajax({

        url:"generateCourse.php",
        type:"GET",
        success:function(res){

         $("#courseselect").html(res);

}


})

    }

    generateCourse();


// generate attendance

$("#generate").on("click",function(e){


    var lectureno = $("#lectureno").val();
    var course = $("#courseselect").val();
    var date = $("#date").val();

    console.log(lectureno + course + date);

    $.ajax({

        url:"generateAttendance.php",
        type:"GET",
        data: {lectureno:lectureno,course:course,date:date},
        success:function(res){

            $("#attendance").html(res);

        }


    });


});


//marking the attendence by udpate
  function updateDataForRow(id, newData) {
    $.ajax({
      url: 'updateAttendance.php',
      method: 'POST',
      data: { id: id, newData: newData },
      success: function(response) {
        $("#extra").html(response);
    },
      error: function(xhr, status, error) {
        console.error('Error updating data for ID: ' + id);
      }
    });
  }

  $('#save').on('click', function() {
    $('#attendance tbody tr').each(function() {
      
      var id = $(this).find('td:eq(0)').text(); 
      var newData = $(this).find('td:eq(4) select').val(); 
      console.log(id + newData);
      updateDataForRow(id, newData);
    });

    location.reload();  
  });





});


</script>

</body>

</html>