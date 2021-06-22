
<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        include './_dbconnect.php';

        $username = $_POST['username'];
        $username = str_replace("<", "&lt;", $username);
        $username = str_replace(">", "&gt;", $username);
        
        $email = $_POST['email'];
        
        $message = $_POST['message'];
        $message = str_replace("<", "&lt;", $message);
        $message = str_replace(">", "&gt;", $message);

        $insert = false;
        $err = false;

        $sql = "INSERT INTO enquiry(username, email, message)
                VALUES('$username', '$email', '$message')";
                
        $result = mysqli_query($conn, $sql); 

        if ($result) {
            $insert = true;
        }
        else{
            $err = "<p>We are facing some issues!<br>Please try after sometime</p>";
        }
    }
        

    echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
            
            <link rel="preconnect" href="https://fonts.gstatic.com">
            <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
            
            <script src="https://kit.fontawesome.com/767a85f1ee.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" href="../css/_valid.css" />
            <link rel="stylesheet" href="../css/style.css" />
            <title>QUERY | VIT CRMS</title>
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
                echo "<h2>Your Query is recorded</h2>";
                echo "<h1 class='success'><strong>SUCCESS</strong> <i class='fas fa-check-circle'></i></h1>"; 
                echo '
                    <div class="dots">
                        <span class="success-dot"></span>
                        <span class="success-dot"></span>
                        <span class="success-dot"></span>
                        <span class="success-dot"></span>
                    </div>
                ';
                echo "<p>Click Here for <a class='dotted' href='../index.php'>Home Page</a></p>";
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