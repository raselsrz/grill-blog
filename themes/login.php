<?php 

global $conn,$title;

$title = "Localhost-Blog-Site Login or Sign Up Page";

$result = mysqli_query($conn, "select * from users_data");
$try_login = false;
$error_msg= '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $try_login = true;

    $email = $_POST['l_email'];
    $password = $_POST['l_password'];

        while ($user = mysqli_fetch_assoc($result)) {
          if ($user['email'] == $email && $user['password'] === $password) {
              $_SESSION['user_data'] = $user;
              $_SESSION['login'] = true;
          }
      }


        if (!isset($_SESSION['login']) || !$_SESSION['login']) {
            $error_msg="Wrong Accses";
        }

}

if (isset($_SESSION['login']) && $_SESSION['login']) {

   redirect('/profile');
}




get_header(); ?>

<div class="login_item">

  <div class="containers" id="container">
    <div class="form-container sign-up-container">
      <form  method="POST" action="/signup">
        <h1>Create Account</h1>
        
        <div class="social-container">
          <a href="#" class="social"><i class='bx bxl-facebook-circle'></i></a>
          <a href="#" class="social"><i class='bx bxl-google'></i></a>
          <a href="#" class="social"><i class='bx bxl-linkedin'></i></a>
        </div>
        <span>or use your email for registration</span>
        <input type="text" name="name" placeholder="Enter Your Name" required />
        <input type="text" name="address" placeholder="Enter Your Address" required />
        <input type="number" name="phone" placeholder="Enter Your Phone Nunber" required />
        <input type="email" name="email" placeholder="Enter Your Email" required />
        <input type="password" name="password" placeholder="Enter Your Password" id="signUpPassword" required />
        <span class="show_icons" onclick="togglePassword('signUpPassword')"><i class='bx bx-show'></i></span>
        <button>Sign Up</button>
      </form>
    </div>
    <div class="form-container sign-in-container">
      <form  method="POST">
        <h1>Login</h1>
        <?php 
       if ($try_login && !empty($error_msg)){
          ?>
          <h2><?php echo $error_msg; ?></h2>

          <?php
        }

         ?>
        <div class="social-container">
          <a href="#" class="social"><i class='bx bxl-facebook-circle'></i></a>
          <a href="#" class="social"><i class='bx bxl-google'></i></a>
          <a href="#" class="social"><i class='bx bxl-linkedin'></i></a>
        </div>
        <span>or use your account</span>
        <input type="email" name="l_email" placeholder="Enter Your Email" required />
        <input type="password" name="l_password" placeholder="Enter Your Password" id="signInPassword" required />
        <span class="show-icon" onclick="togglePassword('signInPassword')"><i class='bx bx-show'></i></span>

        <a href="#">Forgot your password?</a>
        <button type="submit">Login</button>
      </form>
    </div>
    <div class="overlay-container">
      <div class="overlay">
        <div class="overlay-panel overlay-left">
          <h1>Welcome Back!</h1>
          <p>To keep connected with us, please login with your personal info</p>
          <button class="ghost" id="signIn">Login</button>
        </div>
        <div class="overlay-panel overlay-right">
          <h1>Hello, Friend!</h1>
          <p>Enter your personal details and start the journey with us</p>
          <button class="ghost" id="signUp">Sign Up</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  const signUpButton = document.getElementById('signUp');
  const signInButton = document.getElementById('signIn');
  const container = document.getElementById('container');

  signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
  });

  signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
  });

  function togglePassword(passwordFieldId) {
    const passwordField = document.getElementById(passwordFieldId);
    passwordField.type = passwordField.type === 'password' ? 'text' : 'password';
  }
</script>

<?php get_footer(); ?>
