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



            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->

            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                            <li class="breadcrumb-item active">Welcome!</li>
                                        </ol>
                                    </div>
                                    <h4 class="page-title">Welcome!</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-pink">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-eye-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Daily Visits</h6>
                                        <h2 class="my-2">8,652</h2>
                                    
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-purple">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-wallet-2-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Revenue</h6>
                                        <h2 class="my-2">$9,254.62</h2>
                                       
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-info">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-shopping-basket-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Orders</h6>
                                        <h2 class="my-2">753</h2>
                                       
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-xxl-3 col-sm-6">
                                <div class="card widget-flat text-bg-primary">
                                    <div class="card-body">
                                        <div class="float-end">
                                            <i class="ri-group-2-line widget-icon"></i>
                                        </div>
                                        <h6 class="text-uppercase mt-0" title="Customers">Users</h6>
                                        <h2 class="my-2">63,154</h2>
                                      
                                    </div>
                                </div>
                            </div> <!-- end col-->
                        </div>

                    
                        <!-- end row -->

                        <div class="row">
                       

                            <div class="col-xl-8">
                                <!-- Todo-->
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="p-3">
                                            <div class="card-widgets">
                                                <a data-bs-toggle="collapse" href="#yearly-sales-collapse" role="button" aria-expanded="false" aria-controls="yearly-sales-collapse"><i class="ri-subtract-line"></i></a>
                                                <a href="#" data-bs-toggle="remove"><i class="ri-close-line"></i></a>
                                            </div>   

                                            <div class="app-search d-none d-lg-block">
                                            <form style="width: 40%;" id="searchForm">
                                            <div class="input-group">
                                                <input type="search" class="form-control" placeholder="Search..." id="searchInput">
                                                <span class="ri-search-line search-icon text-muted"></span>
                                            </div>
                                        </form>
                                        </div>
                                        </div>
                                       
    
                                        <div id="yearly-sales-collapse" class="collapse show">
    
                                        <div class="card-body">
                                                <table class="table table-striped table-bordered table-hover" id="userTable">
                                                    <thead class="table-dark">
                                                        <tr>
                                                            <th scope="col">Id</th>
                                                            <th scope="col">Username</th>
                                                            <th scope="col">Email</th>
                                                            <th scope="col">Role</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="userData">
                                                        <!-- Table body content will be dynamically populated here -->
                                                    </tbody>
                                                </table>
                                        </div>       
                                        </div>
                                    </div>                           
                                </div> <!-- end card-->
                            </div> <!-- end col-->
                        </div>
                        <!-- end row -->

                    </div>
                    <!-- container -->

                </div>
                <!-- content -->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                    // Fetch data and populate table
                    fetchData();

                    // Add event listener for the search input
                    document.getElementById('searchInput').addEventListener('input', async function (event) {
                        const searchTerm = event.target.value.toLowerCase();
                        await filterTable(searchTerm);
                    });
                });

                async function filterTable(searchTerm) {
                    const tableRows = document.querySelectorAll('#userData tr');

                    for (const row of tableRows) {
                        const username = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                        const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                        const role = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

                        if (
                            username.includes(searchTerm) ||
                            email.includes(searchTerm) ||
                            role.includes(searchTerm)
                        ) {
                            row.style.display = '';
                        } else {
                            row.style.display = 'none';
                        }
                    }
                }

                </script>
                <script>
                    function fetchData() {
                        var xhr = new XMLHttpRequest();

                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    var data = JSON.parse(xhr.responseText);
                                    populateTable(data); // Populate table with received data
                                } else {
                                    console.error('Error fetching data: ' + xhr.status);
                                }
                            }
                        };

                        xhr.open('GET', '../controller/fetch_data.php?action=fetchData', true);
                        xhr.send();
                    }
                    const roleNames = {
                        1: 'Admin',
                        2: 'Manager',
                        3: 'Client'
                        // Add more roles as needed
                    };

                    function populateTable(data) {
                        var tableBody = document.getElementById('userData');
                        tableBody.innerHTML = '';

                        data.forEach(function (row) {
                            var newRow = document.createElement('tr');

                            newRow.innerHTML = `
                                <td>${row.id}</td>
                                <td>${row.firstname}</td>
                                <td>${row.email}</td>
                                <td>${roleNames[row.type]}</td>
                                <td class="text-center">
                                    <a href="userUpdate.php?id=${row.id}" class="btn btn-primary btn-sm me-2">
                                        <i class="fa-solid fa-pen-to-square"></i> Update
                                    </a>
                                    <?php if ($user_type === 1) { ?>
                                        <!-- Delete user link -->
                                             <a href="../controller/userDelete.php?id=${row.id}" class="btn btn-danger btn-sm">
                                                 <i class="fa-solid fa-trash"></i> Delete                   
                                              </a>                                                             
                                    <?php } ?>  

                                    
                                    <!-- Delete button here -->
                                </td>
                            `;

                            tableBody.appendChild(newRow);
                        });
                    }

                    document.addEventListener('DOMContentLoaded', function () {
                        fetchData();
                    });
                </script>




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
        
    
        <!-- Dashboard App js -->
        <script src="../assets/assets/js/pages/dashboard.js"></script>


        <!-- App js -->
        <script src="../assets/assets/js/app.min.js"></script>

    </body>
</html> 