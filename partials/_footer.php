<?php

    // session_start();
    // if ((isset($_SESSION['loggedin']) || $_SESSION['loggedin'] == true) && $_SESSION['username'] != 'admin') {
    //     $loggedin = true;
    // }
    // else{
    //     $loggedin = false;
    // }

    echo '

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <style>
            .foot-box {
                width: 100%;
                height: 50px;
                display: flex;
                align-items: center;
                justify-content: space-around;
                background-color: #008080;
            }
            .foot-box a::after {
                content: "";
                width: 0;
                height: 2px;
                background-color: rgb(205, 99, 50);
                display: block;
                transition: all 0.4s linear;
            }

            .foot-box a:hover::after {
                width: 95%;
            }
            .foot-box .right {
                text-align: right;
            }
            .foot-box .middle {
                text-align: center;
            }
            .foot-box .middle span {
                font-weight: 900;
                font-weight: bolder;
                color: #FF0;
            }
            .foot-box a {
                display: block;
                width: 120px;
                color: #f1f1f1;
            }
            .foot-box p {
                color: #f1f1f1;
            }

            @media screen and (max-width: 1024px) {
                .foot-box{
                    flex-direction: column;
                    align-items: flex-start;
                    padding: 50px 40px;
                }
                .foot-box p{
                    padding: 5px 0;
                }
            }


            </style>
        </head>
        <body>
            <div class="foot-box">

    ';

    if (!$loggedin) {
        echo'
                <p><a href="./admin/login.php">Admin Login</a></p>

        '; 
    }

    if($loggedin){ 
        echo '

                <p class="middle">Welcome : <span>' . $_SESSION['username'] . '</span></p>
        
        '; 
    } 
        
    echo '

                <p class="right">Visit on : ' . date('F j, Y, l') . '</p>
            </div>
            <footer>
            <div class="foot">
                <div class="sec why-this">
                <h2>Why This ?</h2>
                <p>
                    We are here to provide a interface for students who have problems
                    in finding the study resources. Here you all can find the resources 
                    and also help some other student who need it.
                </p>
                </div>
                <div class="sec downloads">
                <h2>Download</h2>
                <ul>
                    <li><a href="./download.php">Books</a></li>
                    <li><a href="./download.php">Notes</a></li>
                    <li><a href="./download.php">Assignment</a></li>
                    <li><a href="./download.php">Lab Project</a></li>
                </ul>
                </div>
                <div class="sec uploads">
                <h2>Upload</h2>
                <ul>
                    <li><a href="./upload.php">Notes</a></li>
                    <li><a href="./upload.php">Problems</a></li>
                    <li><a href="./upload.php">Lab Work</a></li>
                    <li><a href="./upload.php">Assignment</a></li>
                </ul>
                </div>
            </div>
            <hr />
            <div class="copyright">
                <p>
                Copyright © 2021 <a href="./index.php">VIT CRMS</a>. All Rights
                Reserved.
                </p>
            </div>
            </footer>
        </body>
        </html>

';

?>