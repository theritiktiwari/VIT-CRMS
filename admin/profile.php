<?php

    require './inside/valid_login.php';
    
    echo $_SESSION['msg'] = false;

    include '../partials/_dbconnect.php';


    if (isset($_POST['user'])) {
        $username = $_POST['username'];
        $id = $_SESSION['sno'];
        $success = false;
        $error = false;

        $sql = "SELECT * FROM admin WHERE sno = '$id'";
        
        $res = mysqli_query($conn, $sql); 

        if (mysqli_num_rows($res) > 0) {
            $sql = "UPDATE admin
                    SET username = '$username'
                    WHERE sno = '$id'";
                        
            $result = mysqli_query($conn, $sql); 
            
            if ($result) {
                $_SESSION['msg'] = "<p class='success'>Username changed successfully</p>";
            }
            else{
                $_SESSION['msg'] = "<p class='error'>We are facing some issues!<br>Please try after sometime</p>";
            }
        }
        else{
            $_SESSION['msg'] = "<p class='error'>No Username found</p>";
        }
    }


    if (isset($_POST['pass'])) {

        $opassword = $_POST['opassword'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $id = $_SESSION['sno'];

        $success = false;
        $error = false;

        $sql = "SELECT * FROM admin WHERE sno = '$id'";
        
        $res = mysqli_query($conn, $sql); 
        
        if (mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)){
                if (password_verify($opassword, $row['password'])) {
                    if (($password === $cpassword)) {
                        $passhash = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "UPDATE admin
                                SET password = '$passhash'
                                WHERE sno = '$id'";
                        
                        $result = mysqli_query($conn, $sql); 
            
                        if ($result) {
                            $_SESSION['msg'] = "<p class='success'>Password changed successfully</p>";
                        }
                        else{
                            $_SESSION['msg'] = "<p class='error'>We are facing some issues!<br>Please try after sometime</p>";
                        }
                    }
                    else{
                        $_SESSION['msg'] = "<p class='error'>Password doesn't match</p>";
                    }
                }
                else{
                    $_SESSION['msg'] = "<p class='error'>Invalid Old Password</p>";
                }
            }
        }
        else{
            $_SESSION['msg'] = "<p class='error'>No username found</p>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
    <?php require '../links/links.php'; ?>
                        
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/admin.css">
    <title>PROFILE - ADMIN | VIT CRMS</title>
</head>
<body>

    <div class="mode">
        <img src="../images/moon.svg" id="mode" alt="Theme Change">
    </div>

    <div class="heading_profile">
        <h2>Hello <?php echo $_SESSION['username']; ?></h2>
    </div>
    
    <div class="cont_profile">
        
        <div class="left_profile">
            <form action=" <?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="box-name">
                    <div class="inp">
                        <i class="fas fa-user"></i>
                        <input type="text" value="<?php echo $_SESSION['username']; ?>" placeholder="Username" name="username" id="username" />
                    </div>
                    <input type="submit" value="Change Username" class="btn" name="user">
                </div>
                <div class="box-pass">
                    <div class="inp">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Old Password" name="opassword" id="opassword" />
                    </div>
                    <div class="inp">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="New Password" name="password" id="password" />
                    </div>
                    <div class="inp">
                        <i class="fas fa-lock"></i>
                        <input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" />
                    </div>
                    <input type="submit" value="Change Password" class="btn" name="pass">
                </div>
                <?php echo $_SESSION['msg']; ?>
            </form>
            
                    
            <div class="nav-profile">
                <button class="btn"><a href="./dashboard.php">BACK TO HOME</a></button>
                <button class="btn" id="btnr"><a href="../logout.php">LOGOUT</a></button>
            </div>
        
        </div>
        <div class="right_profile">
            <img src="../images/admin.png" alt="">
        </div>
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