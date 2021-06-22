<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        include './_dbconnect.php';

        $email = $_POST['email'];
        $password = $_POST['password'];

        $login = false;
        $match = false;

        $sql = "SELECT * FROM user_data WHERE email = '$email'";
        
        $result = mysqli_query($conn, $sql); 
        $num = mysqli_num_rows($result);

        if ($num) {
            while($row = mysqli_fetch_assoc($result)){
                if (password_verify($password, $row['password'])) {
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['msg'] = true;
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['user_id'] = $row['user_id'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['register'] = $row['user_time'];
                    $_SESSION['last_login_timestamp'] = time(); 
                    header("location: ../index.php");
                }
                else{
                    $match = "Invalid Password";
                }
            }
        }
        else{
            $match = "Invalid Email Address";
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
            <title>LOGIN | VIT CRMS</title>
            <style>
            
            </style>
        </head>
        <body>

            <div class="mode">
                <img src="../images/moon.svg" id="mode" alt="Theme Change">
            </div>

            <div class="cont">
    ';

    if ($match) {
                echo "<h2 style='text-align:center'>" . $match . "</h2>"; 
                echo "<h1 class='error'>ERROR <i class='fas fa-times-circle'></i></h1>"; 
                echo '
                    <div class="dots">
                        <span class="error-dot"></span>
                        <span class="error-dot"></span>
                        <span class="error-dot"></span>
                        <span class="error-dot"></span>
                    </div>
                ';
                echo "<p>Click Here to <a class='dotted' href='../user.php'>LOG IN</a> again</p>";
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