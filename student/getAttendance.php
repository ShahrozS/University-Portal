<?php

$cid = $_GET["id"];

$stdid = $_SESSION["id"];


require '../connection.php';



$sql = "select * from attendance where courseid = {$cid} and userid = {$stdid} order by date desc";


$result = mysqli_query($link,$sql);

$output = "";

if(mysqli_num_rows($result)>0){


    $output .= "<thead>
                <tr>
                
                
                <th>Lectureno</th>
                
                <th>Date</th>
                
                <th>Presence</th>
                
                
                </tr>
        
                    </thead>
                    <tbody>
                    
                    ";

    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr><td>{$row["lectureno"]}</td> <td>{$row["date"]}</td> <td>{$row["presence"]}</td> ";

        $output.="</tr>";
    }

    echo $output;

}



