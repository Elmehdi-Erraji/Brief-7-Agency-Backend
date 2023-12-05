<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
session_start(); 

if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/LogIn.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Dashboard </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="dashboard " name="description" />
        <meta content="Techzaa" name="author" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/assets/images/favicon.ico">

        <!-- Daterangepicker css -->
        <link rel="stylesheet" href="../assets/assets/vendor/daterangepicker/daterangepicker.css">

        <!-- Vector Map css -->
        <link rel="stylesheet" href="../assets/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css">

        <!-- Theme Config Js -->
        <script src="../assets/assets/js/config.js"></script>

        <!-- App css -->
        <link href="../assets/assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-style" />

        <!-- Icons css -->
        <link href="../assets/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <!-- Begin page -->
        <div class="wrapper">

             <!-- ========== Topbar Start ========== -->

                <?php include 'includes/dash-header.php' ?>

            <!-- ========== Topbar Start ========== -->


            <!-- ========== Left Sidebar Start ========== -->

                <?php include 'includes/dash-menue.php' ?>

            <!-- ========== Left Sidebar End ========== -->


<style>
    .error{
        color: red;
        font-size: 15;
        font-weight: 700;
    }
</style>
   <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="header-title">Add a new user</h4>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                        <form action="../controller/userAdd.php" method="POST" id="addUserForm">
    <!-- User Name -->
    <div class="mb-3">
        <label for="name" class="form-label">User Name</label>
        <input type="text" id="name" class="form-control" name="name">
        <span id="nameError" class="error">
            <?php echo isset($_SESSION['errors']['name']) ? $_SESSION['errors']['name'] : ''; ?>
        </span>
    </div>

    <!-- User Role -->
    <div class="mb-3">
        <label for="user_role" class="form-label">User Role</label>
        <select class="form-select" id="user_role" name="user_role">
            <option value="Admin">Admin</option>
            <option value="Manager">Manager</option>
            <option value="Client">Client</option>
            <!-- Add more options if needed -->
        </select>
        <span class="error" id="userRoleError">
            <?php echo isset($_SESSION['errors']['user_role']) ? $_SESSION['errors']['user_role'] : ''; ?>
        </span>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email">
        <span id="emailError" class="error">
            <?php echo isset($_SESSION['errors']['email']) ? $_SESSION['errors']['email'] : ''; ?>
        </span>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <div class="input-group input-group-merge">
            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password">
            <div class="input-group-text" data-password="false">
                <span class="password-eye"></span>
            </div>
        </div>
        <span id="passwordError" class="error">
            <?php echo isset($_SESSION['errors']['password']) ? $_SESSION['errors']['password'] : ''; ?>
        </span>
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm password</label>
        <div class="input-group input-group-merge">
            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Enter your password">
            <div class="input-group-text" data-password="false">
                <span class="password-eye"></span>
            </div>
        </div>
        <span id="confirmPasswordError" class="error">
            <?php echo isset($_SESSION['errors']['confirm_password']) ? $_SESSION['errors']['confirm_password'] : ''; ?>
        </span>
    </div>

    <button type="submit" id="submitButton" class="btn btn-primary" name="submit">Submit</button>
</form>
                    
                                            </div> 
                                        </div>
                                    
                                    </div> 
                                </div> 
                            </div>
                        </div><!-- end row -->

                    

                    </div> <!-- container -->

                </div> <!-- content -->

            

            </div>
            
            <script>
    document.getElementById("addUserForm").addEventListener("submit", function(event) {
        let name = document.getElementById("name").value.trim();
        let email = document.getElementById("email").value.trim();
        let role = document.getElementById("user_role").value.trim();
        let password = document.getElementById("password").value;
        let confirmPassword = document.getElementById("confirmPassword").value;

        let nameError = document.getElementById("nameError");
        let emailError = document.getElementById("emailError");
        let userRoleError = document.getElementById("userRoleError");
        let passwordError = document.getElementById("passwordError");
        let confirmPasswordError = document.getElementById("confirmPasswordError");

        let isValid = true;

        // Clear previous error messages
        nameError.textContent = "";
        emailError.textContent = "";
        userRoleError.textContent = "";
        passwordError.textContent = "";
        confirmPasswordError.textContent = "";

        // Client-side validation
        if (name === "") {
            nameError.textContent = "Please enter your name";
            isValid = false;
        }

        if (!/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/.test(email)) {
            emailError.textContent = "Invalid email format";
            isValid = false;
        }

        if (role === "") {
            userRoleError.textContent = "Please select a user role";
            isValid = false;
        }

        if (password.length < 8) {
            passwordError.textContent = "Password must be at least 8 characters long";
            isValid = false;
        }

        if (confirmPassword !== password) {
            confirmPasswordError.textContent = "Passwords do not match";
            isValid = false;
        }

        if (!isValid) {
            event.preventDefault(); // Prevent the form from submitting if validation fails
        }
    });
</script> 
<?php 
unset($_SESSION['errors']);
unset($_SESSION['old_input']);
?>


        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->

                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 text-center">
                                <script>document.write(new Date().getFullYear())</script> ©   Created by<b> Mehdi</b>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div>

            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        <!-- Theme Settings -->
               
        
        <!-- Vendor js -->
        <script src="../assets/assets/js/vendor.min.js"></script>

        <!-- Daterangepicker js -->
        <script src="../assets/assets/vendor/daterangepicker/moment.min.js"></script>
        <script src="../assets/assets/vendor/daterangepicker/daterangepicker.js"></script>
        
        <!-- Apex Charts js -->
        <script src="../assets/assets/vendor/apexcharts/apexcharts.min.js"></script>

        <!-- Vector Map js -->
        <script src="../assets/assets/vendor/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
        <script src="../assets/assets/vendor/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>

        <!-- Dashboard App js -->
        <script src="../assets/assets/js/pages/dashboard.js"></script>


        <!-- App js -->
        <script src="../assets/assets/js/app.min.js"></script>

    </body>
</html> 