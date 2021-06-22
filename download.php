<?php 


    require './partials/_validation.php'; 
    

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
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/data.css">
        
        <title>DOWNLOAD | VIT CRMS</title>
    </head>
    <body>
    
';
    
    echo '

    <section class="navbar">
    <nav>
        <div class="logo">
            <!-- <h2>VIT CRMS</h2> -->
            <h2><a href="index.php"><img src="./images/logo.png" width="56px" alt=""></a></h2>
        </div>
        
        <input type="checkbox" name="nav-toggle" id="nav-toggle">
        <ul class="nav-links">
            <li><a class="nav-link" href="./index.php#home">Home</a></li>
            <li><a class="nav-link" href="./index.php#about">About Us</a></li>
            <li><a class="nav-link" href="./download.php">Download</a></li>
            <li><a class="nav-link" href="./upload.php">Upload</a></li>
            <li><a class="nav-link" href="./index.php#contact">Contact Us</a></li>

    ';

    if(!$loggedin){

        echo'

            <li><a class="nav-btn" href="./user.php">Login <i class="fas fa-sign-out-alt"></i></a></li>
            
        ';
    }

    if($loggedin){

        echo'

            <li><a href="#" class="nav-btn">' . $_SESSION['username'] . '</a>
                <div class="dropdown">
                    <ul>
                        <li><a href="./profile.php"><i class="far fa-address-card"></i> Profile</a></li>
                        <li><a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </li>
            
        ';
    }

    echo '

    </ul>
        <label for="nav-toggle" class="nav-lines">
            <div class="nav-line"></div>
            <div class="nav-line"></div>
            <div class="nav-line"></div>
        </label>
    </nav>
    </section>

    ';
    
echo '
    
    <div class="mode">
        <img src="./images/moon.svg" id="mode" alt="Theme Change">
    </div>

    
    <h1 class="main_heading">DOWNLOAD YOUR NEED</h1>
    <section class="download-container">
        <div class="download">
            <div class="leftside">
                <h2>Hello ';

                        if(isset($_SESSION['username'])){
                            echo $_SESSION['username'] ;
                        }
                            
                        echo ' !!!</h2>
                <p>How are you ?</p>
                <p>What do you want ?</p>
                <p>Here is everything for you.</p>
            </div>
            <div class="rightside">
                <h2>Enter Details</h2>
                <form action="./data_download.php" method="post">
                    <label for="type"></label>
                    <select class="input type" name="type" id="type" aria-placeholder="Select one" required>
                        <option value="none" selected disabled hidden>Select an Option</option>
                        <option value="book">Books</option>
                        <option value="note">Notes</option>
                        <option value="lab_record">Lab Project</option>
                        <option value="assignment">Assignment</option>
                        <option value="practice_problem">Practice Problems</option>
                    </select>
                    <input class="input" list="course_name" name="course_name" placeholder="Course Name" required>
                    <datalist id="course">
                        <option value="CSE1001"></option>
                        <option value="CSE1002"></option>
                        <option value="CSE1003"></option>
                        <option value="CSE2004"></option>
                        <option value="MGT1037"></option>
                    </datalist>
                    <input class="input" type="text" list="faculty_name" name="faculty_name" placeholder="Faculty Name" required>
                    <!-- <datalist id="name">
                        <option value=""></option>
                    </datalist> -->
                    <input class="btn" type="submit" value="Search">
                </form>
            </div>
        </div>
    </section>



    <script src="./main.js"></script>
    

</body>
</html>

';

?>