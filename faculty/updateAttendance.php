<?php

require "../connection.php";
echo "heere";
$id = $_POST["id"];

$presence = $_POST["newData"];

$sql = "update attendance set presence = {$presence} where id = {$id}";

if(mysqli_query($link,$sql)){
    echo "Updated!";
}
else{
    echo "Cant update";
}




