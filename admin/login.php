<?php

$match = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include '../partials/_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $match = false;

    $sql = "SELECT * FROM admin WHERE username = '$username'";
    
    $result = mysqli_query($conn, $sql); 
    $num = mysqli_num_rows($result);

    if ($num) {
        while($row = mysqli_fetch_assoc($result)){
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $row['username'];
                $_SESSION['sno'] = $row['sno'];
                $_SESSION['last_login_timestamp'] = time(); 
                header("location: dashboard.php");
            }
            else{
                $match = "Invalid Password";
            }
        }
    }
    else{
        $match = "Invalid Username";
    }
}


// ADDING NEW ADMIN

// if ($_SERVER['REQUEST_METHOD'] == 'POST') {

//     include '../partials/_dbconnect.php';
    
//     $username = mysqli_real_escape_string($conn, $_POST['username']);
    
//     $password = mysqli_real_escape_string($conn, $_POST['password']);

//     $insert = false;
//     $err = false;

//     $passhash = password_hash($password, PASSWORD_DEFAULT);
//     $sql = "INSERT INTO admin(username, password, time) VALUES ('$username', '$passhash', current_timestamp())";
            
//     $result = mysqli_query($conn, $sql); 

//     if ($result) {
//         $match = "Signup Successfull!";
//     }
//     else{
//         $match = "We are facing some issues! Please try after sometime";
//     }
// }
    
echo '


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <script src="https://kit.fontawesome.com/767a85f1ee.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/login.css">
    <link rel="stylesheet" href="../css/style.css">

    <title>Login Admin Panel | VIT CRMS</title>
</head>

<body>

    <div class="mode">
        <img src="../images/moon.svg" id="mode" alt="Theme Change">
    </div>

    <div class="container">
        <h1 class="title">Login to Admin Panel</h1>
        <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="POST" class="form">
            <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" id="username" name="username" placeholder="Username" required />
            </div>
            <div class="input-field">
                <i class="fas fa-lock"></i>
                <input type="password" id="username" name="password" placeholder="password" required />
            </div>



';
    
                if ($match) {
                    echo '<p style="text-align: center;" class="error"><strong>Error!</strong> ' . $match . '</p>';
                }
echo '

            <button type="submit" class="btn">Log In</button>
        </form>
        <p>Back to <a href="../index.php">Home</a></p>
    </div>


    <script>
    // THEME CHANGER

    var icon = document.getElementById("mode");

    icon.onclick = function() {
        document.body.classList.toggle("dark-theme");
        if (document.body.classList.contains("dark-theme")) {
            icon.src = "../images/sun.svg";
        } else {
            icon.src = "../images/moon.svg";

        }
    }
    </script>

</body>

</html>

';

?>