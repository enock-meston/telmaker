<?php
session_start();
include '../include/condig.php';
error_reporting(0);
if (strlen($_SESSION['user_id']) == 0) {
    header('location: index.php');
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
                    <h1>Final Step to Upladad</h1>
                    <?php
                        $reference= $_SESSION['reference'];
                        $musicName= $_SESSION['musicName'];

                        $SelectOneMusic= mysqli_query($con,"SELECT * FROM `musictbl` WHERE referece ='$reference' AND musicname='$musicName'");
                        while ($rowOne=mysqli_fetch_array($SelectOneMusic)) {
                        
                    ?>
                    

                        <form method="POST">
                            
                            <div class="form-group">
                                <input type="text" name="title" class="form-control form-control-user"
                                    value="<?php echo $rowOne['musicname'];?>">
                            </div>
                            <div class="form-group">
                                <input type="text" name="valueInAmmount" required class="form-control form-control-user"
                                    placeholder="Enter Ammount">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1"> Select category</label>
                                <select class="form-control" name="category" required id="exampleFormControlSelect1">
                                    <option hidden>selecting...</option>
                                    <?php
													// Feching active categories
													$ret=mysqli_query($con,"SELECT * from  tblcategory where status=1");
													while($result=mysqli_fetch_array($ret))
													{
													?>
                                    <option value="<?php echo $result['catid'] ;?>">
                                        <?php echo $result['title'] ;?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary" name="savebtn"><i
                                    class="fas fa-fw fa-shopping-cart"></i>
                                Save
                            </button>


                        </form>
                        <?php
                            }
                        
                        ?>
                    

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