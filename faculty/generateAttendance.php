<?php

require '../connection.php';

$lectureno = $_GET["lectureno"];
$course_id = $_GET["course"];
$date1 = $_GET['date'];
$date = date('Y-m-d', strtotime($date1));  

echo '<!--'.$date.'-->';


// getting all students 
$sql = "select uid from student_course where cid  = {$course_id}";


$result = mysqli_query($link,$sql);


if(mysqli_num_rows($result)>0){


while($row = mysqli_fetch_assoc($result)){

 
$sql2 = "insert into attendance (userid,courseid,lectureno,date) values ({$row["uid"]},{$course_id},{$lectureno},'{$date}')";

if(mysqli_query($link,$sql2)){
}
else{
    echo "cant insert";
}

}
}


$sql3 = "select * from attendance where courseid = {$course_id} and lectureno = {$lectureno} and date = '{$date}'";


$result2 = mysqli_query($link,$sql3);
$output = "";
if(mysqli_num_rows($result2) > 0){




        $output .= "<thead>
                    <tr>


                    <th>ID</th>
                    <th>Lectureno</th>
                    <th>Date</th>
                    <th>Roll Number</th>
                    <th>Presence</th>
                    </tr>
            
                        </thead>
                        <tbody>
            
                        ";
    
        while($row = mysqli_fetch_assoc($result2)){
            $output .= "<tr><td>{$row["id"]}</td><td>{$row["lectureno"]}</td> <td>{$row["date"]}</td><td>{$row["userid"]}</td>";
            $output .= "<td><select class='form-select'>
                        <option value='P'>P</option>
                        <option value='A'>A</option>
                        </select></td>";
    
            $output.="</tr>";
        }

        $output .="</tbody>";
        
    
        echo $output;
    
    

}
