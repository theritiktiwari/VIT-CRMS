<?php 

    require './inside/valid_login.php';

    include '../partials/_dbconnect.php'; 


    // NUMBER OF DOWNLOADS


    // ASSIGNMENTS
    $sql = "SELECT assignment_download FROM assignment";
    $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($res)){

        $total_downloads += $row['assignment_download'];
    }

    // BOOKS
    $sql = "SELECT book_download FROM book";
    $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($res)){

        $total_downloads += $row['book_download'];
    }

    // LAB RECORD
    $sql = "SELECT lab_record_download FROM lab_record";
    $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($res)){

        $total_downloads += $row['lab_record_download'];
    }

    // NOTE
    $sql = "SELECT note_download FROM note";
    $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($res)){

        $total_downloads += $row['note_download'];
    }

    // PRACTICE PROBLEMS
    $sql = "SELECT practice_problem_download FROM practice_problem";
    $res = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($res)){

        $total_downloads += $row['practice_problem_download'];
    }



    // NUMBER OF UPLOADS


    // ASSIGNMENTS
    $sql = "SELECT * FROM assignment";
    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);
    $total_uploads += $num;


    // BOOKS
    $sql = "SELECT * FROM book";
    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);
    $total_uploads += $num;


    // LAB RECORD
    $sql = "SELECT * FROM lab_record";
    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);
    $total_uploads += $num;


    // NOTE
    $sql = "SELECT * FROM note";
    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);
    $total_uploads += $num;


    // PRACTICE PROBLEMS
    $sql = "SELECT * FROM practice_problem";
    $res = mysqli_query($conn, $sql);

    $num = mysqli_num_rows($res);
    $total_uploads += $num;


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/admin.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <script src="https://kit.fontawesome.com/767a85f1ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    
    <title>ADMIN | VIT CRMS</title>
</head>
<body>
    <section class="divider">

        <header>
            
            <?php require './inside/_header.php'; ?>
            <div class="mode">
                <img src="../images/moon.svg" id="mode" alt="Theme Change">
            </div>
        </header>
        
        <section class="content">
            <div class="top-bar">
                <div class="heading">
                    <h1>VIT CRMS</h1>
                    <h3>College Resources Management System</h3>
                </div>
                <div class="welcome">
                    <h2>Welcome <?php echo $_SESSION['username'];?></h2>
                    <i class="fas fa-user-circle fa-3x"></i>
                    <a href="../logout.php">LOGOUT</a>
                </div>
            </div>
            <div class="content-box">

                <div class="row">
                    <div class="col">
                        <h2>Users</h2>
                        <i class="fas fa-users fa-3x"></i>
                        <?php

                            $sql = "SELECT * FROM user_data";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);

                            echo '<h2>' . $num . '</h2>';
                        ?>
                        
                    </div>
                    <div class="col">
                        <h2>Downloads</h2>
                        <i class="fas fa-cloud-download-alt fa-3x"></i>
                        <?php
                            echo '<h2>' . $total_downloads . '</h2>';
                        ?>
                    </div>
                    <div class="col">
                        <h2>Uploads</h2>
                        <i class="fas fa-cloud-upload-alt fa-3x"></i>
                        <?php
                            echo '<h2>' . $total_uploads . '</h2>';
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h2>Queries</h2>
                        <i class="fas fa-comments fa-3x"></i>
                        <?php

                            $sql = "SELECT * FROM enquiry";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);

                            echo '<h2>' . $num . '</h2>';
                        ?>
                    </div>
                    <div class="col">
                        <h2>Books</h2>
                        <i class="fas fa-book-open fa-3x"></i>
                        <?php

                            $sql = "SELECT * FROM book";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);

                            echo '<h2>' . $num . '</h2>';
                        ?>
                    </div>
                    <div class="col">
                        <h2>Notes</h2>
                        <i class="fas fa-sticky-note fa-3x"></i>
                        <?php

                            $sql = "SELECT * FROM note";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);

                            echo '<h2>' . $num . '</h2>';
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h2>Lab Record</h2>
                        <i class="fas fa-vial fa-3x"></i>
                        <?php

                            $sql = "SELECT * FROM lab_record";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);

                            echo '<h2>' . $num . '</h2>';
                        ?>
                    </div>
                    <div class="col">
                        <h2>Assignment</h2>
                        <i class="fas fa-copy fa-3x"></i>
                        <?php

                            $sql = "SELECT * FROM assignment";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);

                            echo '<h2>' . $num . '</h2>';
                        ?>
                    </div>
                    <div class="col">
                        <h2>Practice Problem</h2>
                        <i class="fas fa-question-circle fa-3x"></i>
                        <?php

                            $sql = "SELECT * FROM practice_problem";
                            $result = mysqli_query($conn, $sql);
                            $num = mysqli_num_rows($result);

                            echo '<h2>' . $num . '</h2>';
                        ?>
                    </div>
                </div>

            </div>
        </section>
    </section>





    <script>
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