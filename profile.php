<?php

    include './partials/_validation.php';
    
    echo $_SESSION['msg'] = false;
    
    
    $id = $_SESSION['user_id'];
    
    $user_time = str_split($_SESSION['register'],10)[1] . " | " . str_split($_SESSION['register'],10)[0];
    
    
    $total_uploads = false;

    include './partials/_dbconnect.php';
    
    // ASSIGNMENTS
    $sql = "SELECT * FROM assignment WHERE assignment_user_id = '$id'";
    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);
    $total_uploads += $num;


    // BOOKS
    $sql = "SELECT * FROM book WHERE book_user_id = '$id'";
    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);
    $total_uploads += $num;


    // LAB RECORD
    $sql = "SELECT * FROM lab_record WHERE lab_record_user_id = '$id'";
    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);
    $total_uploads += $num;


    // NOTE
    $sql = "SELECT * FROM note WHERE note_user_id = '$id'";
    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);
    $total_uploads += $num;


    // PRACTICE PROBLEMS
    $sql = "SELECT * FROM practice_problem WHERE practice_problem_user_id = '$id'";
    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);
    $total_uploads += $num;



    if (isset($_POST['user'])) {
        $username = $_POST['username'];
        $id = $_SESSION['user_id'];
        $success = false;
        $error = false;

        $sql = "SELECT * FROM user_data WHERE user_id = '$id'";
        
        $res = mysqli_query($conn, $sql); 

        if (mysqli_num_rows($res) > 0) {
            $sql = "UPDATE user_data
                    SET username = '$username'
                    WHERE user_id = '$id'";
                        
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
        $id = $_SESSION['user_id'];

        $success = false;
        $error = false;

        $sql = "SELECT * FROM user_data WHERE user_id = '$id'";
        
        $res = mysqli_query($conn, $sql); 
        
        if (mysqli_num_rows($res) > 0) {
            while($row = mysqli_fetch_assoc($res)){
                if (password_verify($opassword, $row['password'])) {
                    if (($password === $cpassword)) {
                        $passhash = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "UPDATE user_data
                                SET password = '$passhash'
                                WHERE user_id = '$id'";
                        
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


echo '


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
            

    ';

    require './links/links.php'; 
                        
    echo '
    <link rel="stylesheet" href="./admin/css/admin.css">
    <title>PROFILE - ' . $_SESSION['username'] . ' | VIT CRMS</title>
</head>
<body>

    <div class="mode">
        <img src="./images/moon.svg" id="mode" alt="Theme Change">
    </div>

    <div class="heading_profile">
        <h2>Hello ' . $_SESSION['username'] . '</h2>
    </div>
    
    <div class="cont_profile">
        
        <div class="left_profile">
            <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">
                <div class="inp" id="dis">
                    <i class="fas fa-envelope"></i>
                    <input value="Email id : ' . $_SESSION['email'] . '" disabled/>
                </div>
                <div class="inp" id="dis">
                    <i class="fas fa-clock"></i>
                    <input value="Member Since : ' . $user_time . '" disabled/>
                </div>
                <div class="inp" id="dis">
                    <i class="fas fa-file"></i>
                    <input value="Total Uploaded Files : ' . $total_uploads . '" disabled/>
                </div>


                <div class="box-name">
                    <div class="inp">
                        <i class="fas fa-user"></i>
                        <input type="text" value="' . $_SESSION['username'] . '" placeholder="Username" name="username" id="username" />
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

                ';


                echo $_SESSION['msg']; 
                echo '
            </form>
            
                    
            <div class="nav-profile">
                <a href="./index.php"><button class="btn">HOME</button></a>
                <a href="./logout.php"><button class="btn" id="btnr">LOGOUT</button></a>
            </div>
        
        </div>
        <div class="right_profile">
            <img src="./images/admin.png" alt="">
        </div>
    </div>

    <script src="./main.js"></script>
    

</script>
</body>
</html>

';

?>