<?php

$cid = $_GET["id"];

session_start();
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


}


//Calculating present percentage
$output2 = "";
$sqlSize = "select count(*) as total from attendance where courseid = {$cid} and userid = {$stdid}";

$resultSize = mysqli_query($link,$sqlSize);
$total = 0;
if(mysqli_num_rows($resultSize)>0){
    $row = mysqli_fetch_assoc($resultSize);

    $total = $row["total"];

}

   
    $sqlA = "select count(*) as t from attendance where courseid = {$cid} and userid = {$stdid} and presence = 'P' ";
    $resultA = mysqli_query($link,$sqlA);
    $totalA = 0;
    if(mysqli_num_rows($resultA)>0){
        $row2 = mysqli_fetch_assoc($resultA);

        $totalA = $row2["t"];

    }else{
        $output2 .="<p>{$resultA}</p>";

    }

$percentage = (intval($totalA)/intval($total))*100;

if($percentage == 0){
$output2 .= "<div class='progress mt-2 mb-2' role='progressbar' aria-label='Info example' aria-valuenow='{$percentage}' aria-valuemin='0' aria-valuemax='100' style='height: 30px'>
<div class='progress-bar bg-danger text-white' style='width: 100%'>{$percentage}%</div>
</div>
";
}
else{
    $output2 .= "<div class='progress mt-2 mb-2' role='progressbar' aria-label='Info example' aria-valuenow='{$percentage}' aria-valuemin='0' aria-valuemax='100' style='height: 30px'>
    <div class='progress-bar bg-info text-dark' style='width: {$percentage}%'>{$percentage}%</div>
    </div>
    ";
}
;

echo json_encode(array("res1"=>$output,"res2"=>$output2));



