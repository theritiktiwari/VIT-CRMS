<?php

    session_start();
    if ((isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true)){
        $loggedin = true;
        if((time() - $_SESSION['last_login_timestamp']) > 900) {
            echo '<script>alert("15 Minutes Over !! Logged Out");</script>';
            $loggedin = false;
            session_unset();
            session_destroy(); 
        }  
        else {  
            $_SESSION['last_login_timestamp'] = time();
        }
    }
    else{
        header("location: ./login.php");
    }

?>