<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");
session_start();
include '../config/db_con.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../view/LogIn.php");
    exit();
}

// database_functions.php
include '../controller/userList.php';




if (isset($_SESSION['user_type'])) {
    $user_type = $_SESSION['user_type'];
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



            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <br>
                        <br>


                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="col-lg-12">
                                    <div class="card card-outline card-success">
                                        <div class="card-header d-flex justify-content-between align-items-center">
                                            <div>
                                                <a href="userAdd.php" class="btn btn-dark">Add New User</a>
                                            </div>
                                            <div>
                                                <!-- Search bar -->
                                                <input type="text" class="form-control" placeholder="Search..." style="width: 200px;">
                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <table class="table table-striped table-bordered table-hover">
                                                <thead class="table-dark">
                                                    <tr>
                                                        <th scope="col">Id</th>
                                                        <th scope="col">Username</th>
                                                        <th scope="col">Email</th>
                                                        <th scope="col">Role</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <?php
                                                // Fetch user data using your function


                                                foreach ($usersData as $row) {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row["id"] ?></td>
                                                        <td><?php echo $row["firstname"] ?></td>
                                                        <td><?php echo $row["email"] ?></td>
                                                        <td><?php echo $row["role"] ?></td>
                                                        <td class="text-center">
                                                            <!-- Update user link -->
                                                            <a href="userUpdate.php?id=<?php echo $row["id"] ?>" class="btn btn-primary btn-sm me-2">
                                                                <i class="fa-solid fa-pen-to-square"></i> Update
                                                            </a>
                                                            <?php if ($user_type === 1) { ?>
                                                                <!-- Delete user link -->
                                                                <a href="../controller/userDelete.php?id=<?php echo $row["id"] ?>" class="btn btn-danger btn-sm">
                                                                    <i class="fa-solid fa-trash"></i> Delete
                                                                </a>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>



                            </div> <!-- container -->

                        </div> <!-- content -->
                        <!-- ============================================================== -->
                        <!-- End Page content -->
                        <!-- ============================================================== -->

                        <!-- Footer Start -->
                        <footer class="footer">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script> © Created by<b> Mehdi</b>
                                    </div>
                                </div>
                            </div>
                        </footer>
                        <!-- end Footer -->
                    <?php } ?>
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