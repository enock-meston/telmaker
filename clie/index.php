<?php
session_start();
include '../include/condig.php';
error_reporting(0);
if (strlen($_SESSION['user_id']) == 0) {
    header('location: ../index.php');
} else {

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="../plugins/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../plugins/css/sb-admin-2.css" rel="stylesheet">
    <link rel="shortcut icon" href="../plugins/img/logo.png" type="image/x-icon">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php 
            include 'include/sidebar.php';
       ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">



                <?php 
                        include 'include/topbar.php'
                   ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Content Row -->
                    <div class="row">
                        <!-- my product Musics -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">
                                            <a href="listProd.php">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">My
                                                    Products
                                                </div>
                                            </a>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <?php 
                                                        $u_id = $_SESSION['user_id'];
                                                    $query = mysqli_query($con, "SELECT * from musictbl WHERE clentId='$u_id' AND status= 1");
                                                    $countposts = mysqli_num_rows($query);
                                                    ?>
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php echo htmlentities($countposts); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-music fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--  -->


                        <!-- my transations -->

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">
                                            <a href="#">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Fees Charge Payments
                                                </div>
                                            </a>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <?php 
                                                        $email_id = $_SESSION['email'];
                                                    $query = mysqli_query($con, "SELECT * from chargetransactiontbl WHERE client_email='$email_id'");
                                                    $countposts = mysqli_num_rows($query);
                                                    ?>
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php echo htmlentities($countposts); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-money-bill fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Draft -->

                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">
                                            <a href="updDra.php">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Music Draft
                                                </div>
                                            </a>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <?php 
                                                        $user_id = $_SESSION['user_id'];
                                                        $status =0;
                                                    $query = mysqli_query($con, "SELECT * from musictbl WHERE status='$status' AND clentId ='$user_id'");
                                                    $countposts = mysqli_num_rows($query);
                                                    ?>
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php echo htmlentities($countposts); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-drafting-compass fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- songs's Transactions -->


                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">

                                        <div class="col mr-2">
                                            <a href="#">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                    Paid Songs
                                                </div>
                                            </a>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <?php 
                                                        $user_email = $_SESSION['email'];
                                                        $status =0;
                                                    $query = mysqli_query($con, "SELECT * from buyaudiotbl WHERE client_email='$user_email'");
                                                    $countposts = mysqli_num_rows($query);
                                                    ?>
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        <?php echo htmlentities($countposts); ?></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-auto">
                                            <i class="fas fa-drafting-compass fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
    </div>
        <!-- Footer -->
        <?php 
                include 'include/footer.php';
           ?>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>




    <!-- Bootstrap core JavaScript-->
    <script src="../plugins/vendor/jquery/jquery.min.js"></script>
    <script src="../plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../plugins/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../plugins/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../plugins/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../plugins/js/demo/chart-area-demo.js"></script>
    <script src="../plugins/js/demo/chart-pie-demo.js"></script>

</body>

</html>

<?php 
   } 
?>