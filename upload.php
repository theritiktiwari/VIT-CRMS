<?php
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include './partials/_dbconnect.php';

        $type = $_POST['type'];
        
        $file_name = $_FILES["file"]["name"]; // Get File name
        $file_temp = $_FILES["file"]["tmp_name"]; // Get file temporary path
        $file_size = $_FILES["file"]["size"]; // Get file size
        
        $file_data = date('j-m-Y-h-i-s_') . $file_name; 

        $location = "uploads/" . $file_data; //Location where files upload
        
        $course_name = $_POST['course_name'];
        $course_name = str_replace("<", "&lt;", $course_name);
        $course_name = str_replace(">", "&gt;", $course_name);
        
        $faculty_name = $_POST['faculty_name'];
        $faculty_name = str_replace("<", "&lt;", $faculty_name);
        $faculty_name = str_replace(">", "&gt;", $faculty_name);

        $user_id = $_SESSION['user_id'];

        $insert = false;
        $err = false;
        $result = false;

        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        
        if (!in_array($extension, ['zip', 'pdf', 'png', 'jpg'])) {
            $err = "File can only be (.pdf, .png, .jpg, .zip)";
        }
        
        elseif ($file_size > 10485760) { // Limit of 10 MB
            // echo "<script>alert('Ooops!! File Size is more than 10 MB');</script>";
            $err = "Ooops!! File Size can't be greater than 10 MB";
        }
        elseif ($type){
            if (move_uploaded_file($file_temp, $location)) {
                
                $db_data = $type . '_data';
                $db_name = $type . '_name';
                $db_course_name = $type . '_course_name';
                $db_faculty_name = $type . '_faculty_name';
                $db_user_id = $type . '_user_id';
                
                $sql = "INSERT INTO $type ($db_name, $db_data, $db_course_name, $db_faculty_name, $db_user_id)
                        VALUES('$file_name', '$file_data', '$course_name', '$faculty_name', '$user_id')
                        ";

                $result = mysqli_query($conn, $sql); 
                
                if ($result) {
                    $insert = "Your file Uploaded Successfully";
                }
                else{
                    $err = "We are facing some issues!<br>Please try after sometime" . mysqli_error($conn);
                }
            }
            else {
                $err = "Not uploaded Successfully";
            }
        }
        else {
            $err = "Please select the category of file";
        }
    }

    if ((isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) && $_SESSION['username'] != 'admin') {
        $loggedin = true;
    }
    else{
        $loggedin = false;
    }

    echo'

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            
    ';

            require './links/links.php';
    
    echo '
            
            <link rel="stylesheet" href="./css/style.css">
            <link rel="stylesheet" href="./css/data.css">
            
            <title>UPLOAD | VIT CRMS</title>
        </head>
        <body>
    ';

            require './partials/_header.php';
    
    echo '
            <div class="mode">
                <img src="./images/moon.svg" id="mode" alt="Theme Change">
            </div>

            
            <h1 class="main_heading">Help Others</h1>
            <section class="download-container">
                <div class="download upload">
                    <div class="leftside">

                        <h2>Hello ' . $_SESSION['username'] . ' !!!</h2>
                        <p>How are you ?</p>
                        <p>It\'s time to payback</p>
                        <p>Get Help by helping someone</p>
                        <p>Upload the material here </p>
                        <p>that\'ll be useful for other student</p>

                    </div>
                    <div class="rightside">
    ';

    if(!$loggedin){

        echo'

            <p style="text-align: center;">Please <a href="./user.php">Login</a> to upload the content</p>
            
        ';
    }

    if($loggedin){
        echo '
                        <h2>Enter Details</h2>
                        <form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post" enctype="multipart/form-data">
                            <label for="type"></label>
                            <select class="input type" name="type" id="type" aria-placeholder="Select one" required">
                                <option value="none" selected disabled hidden>Select an Option</option>
                                <option value="book">Books</option>
                                <option value="note">Notes</option>
                                <option value="lab_record">Lab Project</option>
                                <option value="assignment">Assignment</option>
                                <option value="practice_problem">Practice Problems</option>
                            </select>
                            <input class="input file" type="file" name="file" required>
                            <input class="input" list="course" name="course_name" placeholder="Course Name" required>
                            <datalist id="course">
                                <option value="CSE1001"></option>
                                <option value="CSE1002"></option>
                                <option value="CSE1003"></option>
                                <option value="CSE2004"></option>
                                <option value="MGT1037"></option>
                            </datalist>
                            <input class="input" type="text" list="name" name="faculty_name" placeholder="Faculty Name" required>
                            <!-- <datalist id="name">
                                <option value=""></option>
                            </datalist> -->
        ';

        if ($insert) {
            echo '<p class="success">' . $insert . '</p>';
        }

        if ($err) {
            echo '<p class="error">' . $err . '</p>';
        }
        
        echo '
        
                            <input class="btn" type="submit" value="Upload">
                        </form>
        ';
    }
    echo '
                    </div>
                </div>
            </section>



            <script src="./main.js"></script>

        </body>
        </html>

    ';

?>