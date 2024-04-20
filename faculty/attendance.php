<?php session_start();
    $_SESSION["id"] =79 ;
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

<div class="main">


<div class="form">

<label for="lectureno">Enter the lecture number</label>
<input type="text" class="input" name="lectureno" id="lectureno">


<label for="courseselect">select the course</label>
<select id="courseselect" name="courseselect" id="courseselect">

</select>


<label for="date">Enter the Date</label>
<input type="date" class="input" name="date" id="date">


<button class="btn btn-lg btn-primary" name="generate" id="generate">Generate Attendance!</button>

</div>


<div class="container">

<button class = "btn btn-lg btn-success" name="" id="save">Save!</button>
<table class="table  table-striped" id="attendance">



</table>


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
        console.log('Data updated successfully for ID: ' + id);
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
  });





});


</script>

</body>

</html>