
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include './_dbconnect.php';

    $username = $_POST['username'];
    $username = str_replace("<", "&lt;", $username);
    $username = str_replace(">", "&gt;", $username);
    $user_type = $_POST['type'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cfmpassword'];

    $insert = false;
    $err = false;

    $exist = "SELECT * FROM user_data WHERE email = '$email'";
    $res = mysqli_query($conn, $exist); 

    if (mysqli_num_rows($res) > 0) {

        $err = "<p>Email Already Exists</p>";
    }
    else{
        if (($password === $cpassword)) {
            $passhash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user_data(username, user_type, email, password)
                    VALUES('$username', '$user_type', '$email', '$passhash')";
            
            $result = mysqli_query($conn, $sql); 

            if ($result) {
                $insert = true;
            }
            else{
                $err = "<p>We are facing some issues!<br>Please try after sometime</p>";
            }
        }
        else{
            $err = "<p>Password doesn't match</p>";
        }
    }
}

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    ';
    require '../links/links.php';
            
    echo '
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/_valid.css" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>SIGNUP | VIT CRMS</title>
    <style>
    
    </style>
</head>
<body>

    <div class="mode">
        <img src="../images/moon.svg" id="mode" alt="Theme Change">
    </div>

<div class="cont">
';

        if ($err) {
            echo "<h2 style='text-align:center'>" . $err . "</h2>"; 
            echo "<h1 class='error'><strong>ERROR</strong> <i class='fas fa-times-circle'></i></h1>"; 
            echo '
                <div class="dots">
                    <span class="error-dot"></span>
                    <span class="error-dot"></span>
                    <span class="error-dot"></span>
                    <span class="error-dot"></span>
                </div>
            ';
            echo "<p>Click Here to <a class='dotted' href='../user.php'>SIGN UP</a> again</p>";
        }

        if ($insert) {
            echo "<h2>Your account is created</h2>";
            echo "<h1 class='success'><strong>SUCCESS</strong> <i class='fas fa-check-circle'></i></h1>"; 
            echo '
                <div class="dots">
                    <span class="success-dot"></span>
                    <span class="success-dot"></span>
                    <span class="success-dot"></span>
                    <span class="success-dot"></span>
                </div>
            ';
            echo "<p>Click Here to <a class='dotted' href='../user.php'>LOGIN</a></p>";
        }
    
    
echo '   
</div> 

<script>

    // THEME CHANGER

    var icon = document.getElementById("mode");

    icon.onclick = function(){
        document.body.classList.toggle("dark-theme");
        if(document.body.classList.contains("dark-theme")){
            icon.src = "../images/sun.svg";
        }else{
            icon.src = "../images/moon.svg";

        }
    }

</script>

</body>
</html>

';

?>