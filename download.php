<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php require './links/links.php' ?>
    
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/data.css">
    
    <title>DOWNLOAD | VIT CRMS</title>
</head>
<body>
    
    <?php require './partials/_header.php'; ?>
    
    <div class="mode">
        <img src="./images/moon.svg" id="mode" alt="Theme Change">
    </div>

    
    <h1 class="main_heading">DOWNLOAD YOUR NEED</h1>
    <section class="download-container">
        <div class="download">
            <div class="leftside">
                <h2>Hello <?php echo $_SESSION['username']; ?> !!!</h2>
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