<?php

$cid = $_GET["id"];

session_start();
if(isset($_SESSION['id'])){
    $stdid = $_SESSION["id"];
 }else{
     header("Location: localhost:3000/login.php");
 }


require '../connection.php';



$sql = "select * from grades where courseid = {$cid} and userid = {$stdid} ";


$result = mysqli_query($link,$sql);

$output = "";

if(mysqli_num_rows($result)>0){


    $output .= "<thead>
                <tr>
                
                
                <th>Assigment</th>
                <th>Project</th>              
                <th>Quiz</th>
                <th>Mid Term</th>
                <th>Final</th>
                <th>Grade</th>
                </tr>
        
                    </thead>
                    <tbody>
                    
                    ";

    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr><td>{$row["assigment"]}</td> <td>{$row["project"]}</td> <td>{$row["quiz"]}</td> <td>{$row["midterm"]}</td> <td>{$row["final"]}</td> <td>{$row["grade"]}</td>    ";


       



        $output.="</tr>";
    }

    echo $output;

}



