<?php

    session_start();
    if ((isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) && $_SESSION['username'] != 'admin') {
        $loggedin = true;
    }
    else{
        $loggedin = false;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['snoEdit'])) {
          $sno = $_POST['snoEdit'];
          $title = $_POST['titleEdit'];
          $description = $_POST['descriptionEdit'];
        
          $sql = "UPDATE todo_list
                  SET title = '$title', description = '$description'
                  WHERE sno = '$sno'
                ";
          
          $result = mysqli_query($conn, $sql); 
      
          if ($result) {
            $update = true;
          }
          else{
            $update = false;
          }
          
        }
        else{
          $title = $_POST['title'];
          $description = $_POST['description'];
      
          $sql = "INSERT INTO todo_list(title, description)
                  VALUES('$title', '$description')
                ";
          
          $result = mysqli_query($conn, $sql); 
      
          if ($result) {
            $insert = true;
          }
          else{
            $insert = false;
          }
        }
      }











?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php require './links/links.php'; ?>

    <link rel="stylesheet" href="./css/style.css">
    <title><?php echo $_SESSION['username']; ?> | VIT CRMS</title>
</head>
<body>

    <div class="mode">
        <img src="./images/moon.svg" id="mode" alt="Theme Change">
    </div>

    <div class="container">
        <h2>Personal Details</h2>
        <p>Name = <?php echo $_SESSION['username']; ?></p>

        <form action="./profile.php" method="POST">
        <label for="username">Full Name</label>
        <input type="text" name="username" id="username" placeholder="<?php echo $_SESSION['username']; ?>">
        <label for="opassword">Old Password</label>
        <input type="password" name="opassword" id="opassword" placeholder="Old Password">
        <label for="passoword">New Password</label>
        <input type="password" name="password" id="password" placeholder="New Password">
        <label for="cpassword">Confirm Passoword</label>
        <input type="password" name="cpassword" id="cpassword" placeholder="Confirm passoword">
        </form>
    </div>
    

<script src="./main.js"></script>


</body>
</html>