<?php
$error = "";
$msg = "";
include 'include/condig.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Verify email</title>

    <!-- Custom fonts for this template-->
    <link href="plugins/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="plugins/css/sb-admin-2.css" rel="stylesheet">
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

                   

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4>
                            Email Verification
                        </h4>

                    </div>

                    <div class="row">
                        <div class="col-lg-4 text-primary">
                            <?php
                            if (isset($_GET['vkey'])) {
                                $vkey = $_GET['vkey'];
                                $resultSet = mysqli_query($con,"SELECT * FROM clienttbl WHERE verified =0 AND vkey='$vkey'");

                                if (mysqli_num_rows($resultSet) == 1) {
                                    // Validate email
                                    $updateVerify= mysqli_query($con,"UPDATE clienttbl SET verified = 1 WHERE vkey='$vkey' LIMIT 1");
                                    if ($updateVerify) {
                                        $msg = "Your Account has Been Verified. You may now Login";
                                    }else {
                                        $error ="System Error, Contuct Us !";
                                    }
                                } else {
                                    $error = "This email was Verified !";
                                }
                                
                            } else {
                                $error ="Something went Wrong";
                            }
                            
                            
                            
                            ?>
                        </div>

                    </div> <!-- /.row-->

                </div>
                <!-- /.container-fluid -->


                     <!-- message block -->
                    <div class="col-sm-12">
                        <!---Success Message--->
                        <?php if ($msg) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                        </div>
                        <?php } ?>

                        <!---Error Message--->
                        <?php if ($error) { ?>
                        <div class="alert alert-danger" role="alert">
                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                        </div>
                        <?php } ?>
                    </div>
                    <!--ends of message block -->

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