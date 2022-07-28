<?php
session_start();
$error = "";
$msg = "";
// include('include/config.php');
// error_reporting(0);
// if (strlen($_SESSION['email']) == 0) {
//     header('location:index.php');
// } else {


    
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TelMaker</title>

    <!-- Custom fonts for this template-->
    <link href="plugins/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="plugins/css/sb-admin-2.css" rel="stylesheet">
    <link rel="shortcut icon" href="../plugins/img/mcmlogopng.png" type="image/x-icon">
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
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4>
                            Music
                        </h4>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card shadow mb-1">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-0 mt-1 mb-1" style="width: 25rem;"
                                            src="plugins/img/samp1.jpg" alt="...">
                                    </div>
                                    <h6 class="m-0 font-weight-bold text-dark"
                                        style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                        and make up the bulk of the card's content.
                                    </h6>
                                    <p
                                        style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; color: rgba(0, 0, 0, 1.0); font-size:12px;">
                                        Some quick example text to build on the card title and make up the bulk of the
                                        card's content.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card shadow mb-1">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-0 mt-1 mb-1" style="width: 25rem;"
                                            src="plugins/img/samp.jpg" alt="...">
                                    </div>
                                    <h6 class="m-0 font-weight-bold text-dark"
                                        style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                        and make up the bulk of the card's content.
                                    </h6>
                                    <p
                                        style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; color: rgba(0, 0, 0, 1.0); font-size:12px;">
                                        Some quick example text to build on the card title and make up the bulk of the
                                        card's content.
                                    </p>
                                    
                                </div>
                            </div>
                        </div>
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


    <div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Market Owner(Default account) </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- transaction viewing Table -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <!-- form of adding Categories -->
                            <form action="" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="fname" class="form-control form-control-user"
                                            id="exampleFirstName" placeholder="First Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="lname" class="form-control form-control-user"
                                            id="exampleLastName" placeholder="Last Name">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="phone" class="form-control form-control-user"
                                            id="exampleFirstName" placeholder="Phone Number">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="username" required
                                            class="form-control form-control-user" id="exampleLastName"
                                            placeholder="User-Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" required class="form-control form-control-user"
                                        id="exampleInputEmail" placeholder="Email Address">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="password" required
                                            class="form-control form-control-user" id="exampleInputPassword"
                                            placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" name="rpassword" required
                                            class="form-control form-control-user" id="exampleRepeatPassword"
                                            placeholder="Repeat Password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="save" name="ownerbtn">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- end of table -->
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap core JavaScript-->
    <script src="plugins/vendor/jquery/jquery.min.js"></script>
    <script src="plugins/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="plugins/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="plugins/js/sb-admin-2.min.js"></script>

</body>

</html>

<?php 
    //} 
?>