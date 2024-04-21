<?php

// in validation i will extract the url, from that i will check on what folder the user is on after that i willl compare the url and the current role, if they mismatch it means the user doesnt
//belongs here so i will redirect them to login


$currentURL = $_SERVER['REQUEST_URI'];


$urlParts = parse_url($currentURL);


$path = $urlParts['path'];

$pathParts = explode('/', $path);

$directoryName = $pathParts[1];


if(isset($_SESSION["role"])){


    if($_SESSION["role"] != $directoryName){
        header("Location: lcoalhost:3000/login.php");

    }
}
else{
    header("Location: lcoalhost:3000/login.php");

}
