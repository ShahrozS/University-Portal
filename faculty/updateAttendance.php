<?php

require "../connection.php";
echo "heere";
$id = $_POST["id"];

$presenceval = $_POST["newData"];


$sql = "update attendance set presence = '{$presenceval}' where id = {$id}";

if(mysqli_query($link,$sql)){
    echo "Updated!";
}
else{
    echo "Cant update"; 
}





