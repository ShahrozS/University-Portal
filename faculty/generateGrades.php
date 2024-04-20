<?php

require '../connection.php';


$cid = $_GET["id"];



//first we will insert based on the course that was selected. course id piche se arahi, student all of the registered student, and their assigment waghera. also check if the grade 
$sql = "select * from grades where courseid = {$cid}";


$result = mysqli_query($link,$sql);

$output  = "";

if(mysqli_num_rows($result) > 0){


    $output .= "<thead>
    <tr>
    
    
    <th>Roll Number</th>
    
    <th>Assignment</th>
    
    <th>Quiz</th>
    
    
    <th>Project</th>
    
    
    
    
    <th>MidTerm</th>
    
    
    <th>Final</th>
    
    
    <th>Grade</th>
    
    
    <th>Actions</th>
    
    
    </tr>

        </thead>
        <tbody>
        
        ";

while($row = mysqli_fetch_assoc($result)){
$output .= "<tr><td>{$row["userid"]}</td> <td>{$row["assigment"]}</td> <td>{$row["quiz"]}</td> <td>{$row["project"]}</td> <td>{$row["midterm"]}</td> <td>{$row["final"]}</td> <td>{$row["grade"]}</td>";

$output .="<td>
<a href='editGrade.php?id={$row["id"]} ' class='btn btn-success btn-sm'>Edit</a>
</td>";



$output.="</tr>";
}

echo $output;

}



