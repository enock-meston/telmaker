<?php
session_start();
include '../include/condig.php';
error_reporting(0);
if (strlen($_SESSION['admin_id']) == 0) {
    header('location: idex.php');
} else {


    if (isset($_POST['addCat'])) {
        
        $catTitle = mysqli_real_escape_string($con,$_POST['catName']);
        $catDetail = mysqli_real_escape_string($con,$_POST['CatDetails']);
        $ckeqquery = mysqli_query($con,"SELECT * FROM `tblcategory` WHERE title = '".$_POST['catName']."'");
        if (mysqli_num_rows($ckeqquery)>0) {
            $error="The Category you need to insert is already Exist";
        }else {
            $status=1;
            $id = $_SESSION['admin_id'];
            $insertQuery=mysqli_query($con,"INSERT INTO `tblcategory`(`title`, `description`,`AddedBy`,`status`) 
            VALUES ('$catTitle','$catDetail','".$_SESSION['admin_id']."','$status')");
            if ($insertQuery) {
              $msg = "Now Categoty is Added";
            }else {
                $error = " there something Went Wrong";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Category</title>

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
                    <h3>Category</h3>
                    <!-- Content Row -->
                    <div class="row">

                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#CategoryModal">Add <i
                                    class="fas fa-fw fa-plus"></i></a>
                       
                    </div>

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
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Category Form</h5>
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
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Category Title</label>
                                    <input type="text" class="form-control" name="catName" placeholder="Enter Cat Name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"> Cat Details</label>
                                    <textarea class="form-control " required name="CatDetails"
                                        id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="submit" class="btn btn-success" name="addCat">
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