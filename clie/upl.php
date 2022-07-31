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

    <title>Upload</title>

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
                    <div class="row justify-content-center">
                        <form action="payAction.php" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="amount" class="form-control form-control-user"
                                value="100">
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" required class="form-control form-control-user"
                                    value="<?php echo $_SESSION['username'];?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" required class="form-control form-control-user"
                                   value="<?php echo $_SESSION['email'];?>">
                            </div>

                            <div class="form-group">
                                <input type="text" name="phone" required class="form-control form-control-user"
                                   value="<?php echo $_SESSION['phone'];?>">
                            </div>
                            
                            <button type="submit" class="btn btn-primary" 
                            name="paybtn"><i class="fas fa-fw fa-shopping-cart"></i>
                            Pay First to Upload new Music Product
                            </button>
                                
                                
                        </form>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php 
                include 'include/footer.php';
           ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
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