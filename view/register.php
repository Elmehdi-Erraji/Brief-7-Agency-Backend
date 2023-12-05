<?php
session_start(); 

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Digital Agency - Home</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
</head>

<body>


    <?php include 'includes/header.php' ?>



    <main>
        <div class="tp-contact-area grey-bg pt-120 pb-120">
            <div class="container">
                <div class="tp-contact-wrapper p-relative">
                    <div class="tp-contact-shape d-none d-xl-block">
                        <img src="../assets/img/cta/cta-1.png" alt="">
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="contact-us-sction-box mb-60">
                                <h4 class="tp-section-subtitle">Register Now</h4>
                                <h3 class="tp-section-title-xs">Create an Account</h3>
                            </div>
                            <!-- Contact information section remains unchanged -->
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="tpcontact">
                                <div class="tpcontact__heading">
                                    <h4 class="tp-contact-title mb-20">
                                        Register Form
                                    </h4>
                                </div>
                                <div class="tpcontact__form">
                                <form id="registrationForm" action="../controller/register.inc.php" method="post">
                                <input type="text" id="name" name="name" placeholder="Your Name">
                                        <span id="nameError" class="error"></span>

                                        <input type="email" id="email" name="email" placeholder="Email Address">
                                        <span id="emailError" class="error"></span>

                                        <input type="password" id="password" name="password" placeholder="Password">
                                        <span id="passwordError" class="error"></span>

                                        <input type="password" id="confirmPassword" name="password_confirm" placeholder="Confirm Password">
                                        <span id="confirmPasswordError" class="error"></span>

                                        <br><br>
                                        <button class="tp-btn" type="submit" name="submit">Register</button>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script>
    // JavaScript Validation (Client-side)
    document.getElementById("registrationForm").addEventListener("submit", function(event) {
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let password = document.getElementById("password").value;
        let confirmPassword = document.getElementById("confirmPassword").value;

        let nameError = document.getElementById("nameError");
        let emailError = document.getElementById("emailError");
        let passwordError = document.getElementById("passwordError");
        let confirmPasswordError = document.getElementById("confirmPasswordError");

        let isValid = true;

        // Clear previous error messages
        nameError.textContent = "";
        emailError.textContent = "";
        passwordError.textContent = "";
        confirmPasswordError.textContent = "";

        // Client-side validation
        if (name === "") {
            nameError.textContent = "Please enter your name";
            isValid = false;
        }

        if (email === "") {
            emailError.textContent = "Please enter your email address";
            isValid = false;
        } else if (!/^\S+@\S+\.\S+$/.test(email)) {
            emailError.textContent = "Invalid email format";
            isValid = false;
        } 

        if (password === "") {
            passwordError.textContent = "Please enter a password";
            isValid = false;
        } else if (password.length < 8) {
            passwordError.textContent = "Password must be at least 8 characters";
            isValid = false;
        }

        if (confirmPassword === "") {
            confirmPasswordError.textContent = "Please confirm your password";
            isValid = false;
        } else if (password !== confirmPassword) {
            confirmPasswordError.textContent = "Passwords do not match";
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting if validation fails
        }
    });
// Display errors retrieved from session in respective fields
    document.getElementById("nameError").innerHTML = "<?php echo isset($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : ''; ?>";
    document.getElementById("emailError").innerHTML = "<?php echo isset($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : ''; ?>";
    document.getElementById("passwordError").innerHTML = "<?php echo isset($_SESSION['errors']['password']) ? $_SESSION['errors']['password'] : ''; ?>";
    document.getElementById("confirmPasswordError").innerHTML = "<?php echo isset($_SESSION['errors']['password_confirm']) ? $_SESSION['errors']['password_confirm'] : ''; ?>";
</script>
<?php
        unset($_SESSION['errors']['name']);
        unset($_SESSION['errors']['email']);
        unset($_SESSION['errors']['password']);
        unset($_SESSION['errors']['password_confirm']);
        ?>
    <?php include 'includes/footer.php' ?>

    <!-- JS here -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/form-validation.js"></script>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/wow.js"></script>
    <script src="../assets/js/imagesloaded-pkgd.js"></script>
    <script src="../assets/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



</body>

</html>