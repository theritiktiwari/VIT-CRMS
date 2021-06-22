<?php


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include ('./partials/_dbconnect.php');

        $type = $_POST['type'];

        $show_type = strtoupper(str_ireplace("_", " ", $type));
        
        $course_name = $_POST['course_name'];
        $faculty_name = $_POST['faculty_name'];
        
        $course = str_split($course_name,1)[0];
        $faculty = str_split($faculty_name,2)[0];

        $db_course_name = $type . '_course_name';
        $db_faculty_name = $type . '_faculty_name';
        

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
                <link rel="stylesheet" href="./css/data_download.css">

                <title>' . $show_type . ' | VIT CRMS</title>
            </head>
            <body>

                <div class="mode">
                    <img src="./images/moon.svg" id="mode" alt="Theme Change">
                </div>

        ';

        $sql = "SELECT * FROM $type WHERE $db_course_name = '$course_name' AND $db_faculty_name LIKE '$faculty%'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $num = mysqli_num_rows($result);
        
            if ($num) {

                echo '
            
                    <div class="heading">
                        <h1>' . $course_name . ' ' . $show_type . '</h1>
                    </div>

                    <div class="container">
            
            ';

                while($row = mysqli_fetch_assoc($result)){
                    echo '
                        <div class="contain">
                            <div class="image">
                                <a href="./partials/_data.php?id=' . $row['' . $type . '_id'] . '&type=' . $type . '">
                                    <img src="./images/' . $type . '.jpg" alt="' . $type . '">
                                    <i class="fas fa-download fa-7x"></i>
                                </a>
                            </div>
                            <div class="card_data">
                                <h3>' . $row['' . $type . '_name'] . '</h3>
                                <p>Course : ' . $row['' . $type . '_course_name'] . '</p>
                                <p>Faculty : ' . $row['' . $type . '_faculty_name'] . '</p>
                                <a href="./partials/_data.php?id=' . $row['' . $type . '_id'] . '&type=' . $type . '"><button class="download-btn">Download</button></a>
                                <span><i class="fas fa-cloud-download-alt"></i> ' . $row['' . $type . '_download'] . '</span>
                            </div>
                        </div>
                    ';
                }
                echo '</div>';
            }
            else {
                echo '
                
                    <div class="heading">
                        <h3>' . $show_type . ' not found</h3>
                    </div>

                ';
            }
        }

// SHOW RELATED ITEMS REFERENCE TO THE COURSE

        $sql = "SELECT * FROM $type WHERE $db_course_name LIKE '$course%'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $num = mysqli_num_rows($result);
        
            if ($num) {

                echo '
            
                    <div class="heading">
                        <h2>Related ' . $show_type . 'S</h2>
                    </div>

                    <div class="container">
            
                ';

                while($row = mysqli_fetch_assoc($result)){
                    echo '
                        <div class="contain">
                            <div class="image">
                                <a href="./partials/_data.php?id=' . $row['' . $type . '_id'] . '&type=' . $type . '">
                                    <img src="./images/' . $type . '.jpg" alt="' . $type . '">
                                    <i class="fas fa-download fa-7x"></i>
                                </a>
                            </div>
                            <div class="card_data">
                                <h3>' . $row['' . $type . '_name'] . '</h3>
                                <p>Course : ' . $row['' . $type . '_course_name'] . '</p>
                                <p>Faculty : ' . $row['' . $type . '_faculty_name'] . '</p>
                                <a href="./partials/_data.php?id=' . $row['' . $type . '_id'] . '&type=' . $type . '"><button class="download-btn">Download</button></a>
                                <span><i class="fas fa-cloud-download-alt"></i> ' . $row['' . $type . '_download'] . '</span>
                            </div>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }



// SHOW ALL ITEMS UPLOADED IN THE DATABASE

        $sql = "SELECT * FROM $type";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $num = mysqli_num_rows($result);

            if ($num) {

                echo '
            
                    <div class="heading">
                        <h2>All ' . $show_type . 'S</h2>
                    </div>

                    <div class="container">
            
                ';

                while($row = mysqli_fetch_assoc($result)){
                    echo '
                        <div class="contain">
                            <div class="image">
                                <a href="./partials/_data.php?id=' . $row['' . $type . '_id'] . '&type=' . $type . '">
                                    <img src="./images/' . $type . '.jpg" alt="' . $type . '">
                                    <i class="fas fa-download fa-7x"></i>
                                </a>
                            </div>
                            <div class="card_data">
                                <h3>' . $row['' . $type . '_name'] . '</h3>
                                <p>Course : ' . $row['' . $type . '_course_name'] . '</p>
                                <p>Faculty : ' . $row['' . $type . '_faculty_name'] . '</p>
                                <a href="./partials/_data.php?id=' . $row['' . $type . '_id'] . '&type=' . $type . '"><button class="download-btn">Download</button></a>
                                <span><i class="fas fa-cloud-download-alt"></i> ' . $row['' . $type . '_download'] . '</span>
                            </div>
                        </div>
                    ';
                }
                echo '</div>';
            }
        }
        
        echo '         
                </div>
                <script src="./main.js"></script>
                
            </body>
            </html>

        ';
    }
?>