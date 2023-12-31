<?php
session_start(); // Start session
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title>Digital Agency - Sign In</title>
   <meta name="description" content="our agency Website">
   <meta name="viewport" content="width=device-width, initial-scale=1">

   <!-- Place favicon.ico in the root directory -->
   <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon-32x32.png">

   <!-- CSS here -->
   <!-- <link rel="stylesheet" href="../assets/css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="../assets/css/font-awesome-pro.css">
   <link rel="stylesheet" href="../assets/css/custom-animation.css">
   <link rel="stylesheet" href="../assets/css/spacing.css">
   <link rel="stylesheet" href="../assets/css/style.css">
   <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
      crossorigin="anonymous"
    />
</head>

<body>

   
<?php include 'includes/header.php' ?>

   

<main>
    <!-- tp-contact-area-start -->
    <div class="tp-contact-area grey-bg pt-120 pb-120">
        <div class="container">
            <div class="tp-contact-wrapper p-relative">
                <div class="tp-contact-shape d-none d-xl-block">
                    <img src="../assets/img/cta/cta-1.png" alt="">
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="contact-us-sction-box mb-60">
                            <h4 class="tp-section-subtitle">Log in Now</h4>
                            <h3 class="tp-section-title-xs">Welcome back</h3>
                        </div>
                        <!-- Contact information section remains unchanged -->
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="tpcontact">
                            <div class="tpcontact__heading">
                                <h4 class="tp-contact-title mb-20" id="titre">
                                    Login Form
                                </h4>
                            </div>
                            <div class="tpcontact__form">
                                <form id="loginForm" action="../controller/login.inc.php" method="post">
                                <div class="input-group">
                                        <input type="email" name="email" id="loginEmail" placeholder="Email Address">
                                        <span id="loginEmailError" class="error"></span>
                                    </div>

                                    <div class="input-group">
                                        <input type="password" name="password" id="loginPassword" placeholder="Password">
                                        <span id="loginPasswordError" class="error"></span>
                                    </div>

                                    <div class="forgot-password-link">
                                        <a href="#" onclick="showForgotPassword()">Forgot Password?</a>
                                    </div>

                                    <br><br>
                                    <button class="tp-btn" type="submit" name="submit">Login</button>
                                </form>
                                <br>
                                <p id="txt">If you don't have an account, <a href="register.php">sign up here</a>.</p>
                            </div>
                        </div>
                        <div id="forgotPasswordForm" style="display: none;">
                            <div class="tpcontact__heading">
                                <h4 class="tp-contact-title mb-20">Forgot Password</h4>
                            </div>
                            <br>
                            <br>
                            <div class="tpcontact__form">
                                <form>
                                    <div class="input-group">
                                        <input type="email" id="forgotPasswordEmail" placeholder="Your Email">
                                        <span id="forgotPasswordEmailError" class="error"></span>
                                        <br>
                                    </div>
                                    <br>
                                    <div class="button-group">
                                    <button class="tp-btn" type="submit" onclick="sendResetLink()">Reset Password</button>
                                    <button class="tp-btn" type="button" onclick="goToLoginForm()">Go Back</button>
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tp-contact-area-end -->
</main>
<style>
    .button-group {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .button-group button {
        flex: 1;
        margin: 0 5px; /* Adjust margin as needed */
    }
</style>
<script>
    // JavaScript Validation (Client-side)
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        let email = document.getElementById("loginEmail").value.trim();
        let password = document.getElementById("loginPassword").value;

        let emailError = document.getElementById("loginEmailError");
        let passwordError = document.getElementById("loginPasswordError");

        let isValid = true;

        // Clear previous error messages
        emailError.textContent = "";
        passwordError.textContent = "";

        // Client-side validation
        if (email === "") {
            emailError.textContent = "Please enter your email address";
            isValid = false;
        } else if (!/^\S+@\S+\.\S+$/.test(email)) {
            emailError.textContent = "Invalid email format";
            isValid = false;
        }

        if (password === "") {
            passwordError.textContent = "Please enter your password";
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting if validation fails
        }
    });
</script>


<?php include 'includes/footer.php' ?>

   <!-- JS here -->
   <script src="../assets/js/jquery.js"></script>
   <script src="../assets/js/form-validation.js"></script>

   <script src="../assets/js/bootstrap.bundle.min.js"></script> 
   <script src="../assets/js/wow.js"></script>
   <script src="../assets/js/imagesloaded-pkgd.js"></script>
   <script src="../assets/js/main.js"></script>
   <script
   src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
   integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
   crossorigin="anonymous"
 ></script>
 <script
   src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"
   integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
   crossorigin="anonymous"
 ></script>
 <script
   src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"
   integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
   crossorigin="anonymous"
 ></script>

 

</body>
 
</html>