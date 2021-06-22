<?php

$server = "localhost";
$user = "root";
$password = "";
$database = "crms";


$conn = mysqli_connect($server, $user, $password, $database);

if(!$conn){
    die("Not connect with server");
    // echo '<script>alert("Not Successfull");</script>';
}
// else{
//     echo '<script>alert("Successfull");</script>';
// }

?>