<?php 

    require './partials/_validation.php'; 
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="This is a website for the students to help them. They can access the resources here and also help someone else.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <meta http-equiv="refresh" content="10"> -->

    <?php require './links/links.php'; ?>
    
    <link rel="stylesheet" href="./css/style.css">
    
    <title>HOME | VIT CRMS</title>
</head>
<body id="home">

    <?php 
    
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
    
    ?>
    
    <div class="mode">
        <img src="./images/moon.svg" id="mode" alt="Theme Change">
    </div>

    <!-- MAIN HEAD SECTION -->

    <section class="main">
        <div class="intro">
            <div class="intro-text">
                <h1>Makes college life easier</h1>
                <p>Here you'll find everything related to college</p>
            </div>
            <div class="cta">
                <a href="./download.php">
                    <button class="cta-check">Check Now</button>
                </a>
                <a href="./upload.php">
                    <button class="cta-explore">Explore</button>
                </a>
            </div>
        </div>

        <div class="cover-image">
            <img src="./images/head_image.png" alt="Header Image">
        </div>
    </section>


<!-- ABOUT US SECTION -->

    <hr>

    <section class="about-us" id="about">
        <h2>ABOUT US</h2>
        <div class="things">
            <div class="things-row">
                <div class="things-clm">
                    <img src="./images/coding.jpg" alt="">
                    <p>Coding</p>
                </div>
                <div class="things-clm">
                    <img src="./images/lab_record.jpg" alt="">
                    <p>Lab Report</p>
                </div>
            </div>
            <div class="things-row">
                <div class="things-clm">
                    <img src="./images/assignment.jpg" alt="">
                    <p>Assignment</p>
                </div>
                <div class="things-clm">
                    <img src="./images/note.jpg" alt="">
                    <p>Notes</p>
                </div>
            </div>
        </div>
        <div class="data">
            <div class="data-row">
                <div class="data-column">
                    <div class="data-circle" id="dc1">
                        <h3>50<span>%</span></h3>
                    </div>
                    <p>Teachers</p>
                </div>
                <div class="data-column">
                    <div class="data-circle" id="dc2">
                        <h3>75<span>%</span></h3>
                    </div>
                    <p>Students</p>
                </div>
            </div>
            <div class="data-row">
                <div class="data-column">
                    <div class="data-circle" id="dc3">
                        <h3>50<span>%</span></h3>
                    </div>
                    <p>Downloads</p>
                </div>
                <div class="data-column">
                    <div class="data-circle" id="dc4">
                        <h3>25<span>%</span></h3>
                    </div>
                    <p>Uploads</p>
                </div>
            </div>
    </section>


<!-- CONTACT US SECTION -->
    
    <hr>
    
    <section class="contact" id="contact">
        <div class="content">
            <h2>Contact Us</h2>
            <p>Please tell a bit about you so that we can personalize your onboarding experience.</p>
        </div>
        <div class="form-container">
            <div class="contactInfo">
                <div class="box">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>Kelambakkam - Vandalur Rd, <br> Rajan Nagar, Chennai, Tamil Nadu <br> 600-127</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-phone"></i></div>
                    <div class="text">
                        <h3><b>Phone</b></h3>
                        <p>9876-543-210</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="far fa-envelope"></i></div>
                    <div class="text">
                        <h3>Email Address</h3>
                        <p>theritiktiwari@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="contactForm">
                <form action="./partials/_enquiry.php" method="post">
                    <h2>Send Message</h2>
                    <div class="inputBox">
                        <input type="text" name="username" required />
                        <span>Full Name</span>
                    </div>
                    <div class="inputBox">
                        <input type="email" name="email" required />
                        <span>Email Address</span>
                    </div>
                    <div class="inputBox">
                        <textarea required name="message"></textarea>
                        <span>Type Your Message Here</span>
                    </div>
                    <div class="inputBox">
                        <input type="submit" name="send" value="Send">
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php include './partials/_footer.php' ?>

    <script src="./main.js"></script>

</body>
</html>