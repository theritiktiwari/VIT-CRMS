<?php 

    require './inside/valid_login.php';

    include '../partials/_dbconnect.php'; 

    if (isset($_GET['delete'])) {
        $sno = $_GET['delete'];
      
        $sql = "DELETE FROM lab_record
                WHERE lab_record_id = '$sno'";
      
        $result = mysqli_query($conn, $sql);
        $affect = mysqli_affected_rows($conn);
      
        if ($result) {
          if ($affect) {
              echo '<script>alert("Lab Record Deleted");</script>';
          }
          else{
            $delete = false;
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
    
    <link rel="shortcut icon" href="../images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/admin.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

    <script src="https://kit.fontawesome.com/767a85f1ee.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <title>LAB RECORDS | ADMIN | VIT CRMS</title>
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
                    <h3>LAB RECORDS</h3>
                </div>
            </div>
            <div class="content-box">
                <div class="table">

                    <table id="myTable">
                        <thead>
                            <tr>
                                <th>S. No.</th>
                                <th>Name</th>
                                <th>Course Name</th>
                                <th>Faculty Name</th>
                                <th>Downloads</th>
                                <th>Uploading Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $sql = "SELECT * FROM lab_record";
                                $result = mysqli_query($conn, $sql); 

                                $num = mysqli_num_rows($result);

                                if ($num > 0) {
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "
                                        <tr>
                                        <th>" . $i ."</th>
                                        <td>" . $row['lab_record_name'] ."</td>
                                        <td>" . $row['lab_record_course_name'] ."</td>
                                        <td>" . $row['lab_record_faculty_name'] ."</td>
                                        <td>" . $row['lab_record_download'] ."</td>
                                        <td>" . $row['lab_record_time'] ."</td>
                                        <td>
                                            <button class='delete' id='del" . $row['lab_record_id'] . "'>DELETE</button>
                                        </td>
                                        </tr>
                                        ";
                                        $i++;
                                    }
                                }

                            ?>

                        </tbody>
                    </table>
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
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <!-- <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script> -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable( {
                scrollY: '50vh',
                scrollCollapse: true
            } );
        } );
    </script>
    <!-- ACTION FOR FILE -->

    <script>
      deletes = document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element)=>{
        element.addEventListener('click', (e)=>{
          console.log('edit ', );
          sno = e.target.id.substr(3,);
          
          if(confirm("Are you Sure!")){
            console.log("YES");
            window.location = `./manage_lab_record.php?delete=${sno}`;
          }
          else{
            console.log("NO");
          }
        })
      })
    </script>
</body>
</html>
