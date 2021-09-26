<?php


// $server = "localhost";
// $user = "root";
// $password = "";
// $database = "crms";


// $conn = mysqli_connect($server, $user, $password, $database);

// if(!$conn){
//     die("Not connect with server");
// }
    
// Comment above code if you're using heruko server

// ------------------------------------------

// Comment below code if you're using localhost

//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;

// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);

?>