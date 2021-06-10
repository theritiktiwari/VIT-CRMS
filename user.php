
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php require './links/links.php'; ?>
    
    <link rel="stylesheet" href="./css/user.css" />
    <link rel="stylesheet" href="./css/style.css" />
    
    <title>USERS | VIT CRMS</title>
  </head>
  <body>
  
  <div class="mode">
      <img src="./images/moon.svg" id="mode" alt="Theme Change">
  </div>


<!-- LOGIN FORM -->
      
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="./partials/_login.php" method="POST" class="sign-in-form">
            <h2 class="title">Log in</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" id="email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" id="password" required />
            </div>

            <input type="submit" value="Login" class="btn solid" />
            
            <div class="forget"><a href="">Forget Password ?</a></div>
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>

<!-- SIGNUP FORM -->

          <form action="./partials/_signup.php" method="POST" class="sign-up-form">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="User Name" name="username" id="username" required />
            </div>
            <div class="input-radio">
              <input type="radio" id="type" name="type" value="teacher" required />
              <label for="male">Teacher</label>
              <input type="radio" id="type" name="type" value="student" required />
              <label for="female">Student</label>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email" id="email" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" id="password" required />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name="cfmpassword" id="cfmpassword" required />
            </div>
            <input type="submit" class="btn" value="Sign up" />
            <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
              ex ratione. Aliquid!
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="images/login.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="images/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="./main.js"></script>
  </body>
</html>
