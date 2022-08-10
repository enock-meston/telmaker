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
    <link href="../plugins/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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

                        <!-- tables -->
                        <h2>My Products List</h2>

                        <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>N0</th>
                                            <th>Title</th>
                                            <th>Amout (RWF)</th>
                                            <th>Category</th>
                                            <th>date</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>N0</th>
                                            <th>Title</th>
                                            <th>Amout (RWF)</th>
                                            <th>Category</th>
                                            <th>date</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            $query = mysqli_query($con,"SELECT tblcategory.catid,tblcategory.title as ctitle,tblcategory.AddedBy,
                                            musictbl.mid,musictbl.title,musictbl.musicname,musictbl.path,musictbl.thumbnail,musictbl.clentId, 
                                            musictbl.valueInAmmount,musictbl.valueInAmmount,musictbl.data,musictbl.referece as muReference, musictbl.category,
                                            musictbl.status as mustatus FROM musictbl LEFT JOIN tblcategory ON musictbl.category= tblcategory.catid
                                            WHERE musictbl.status = 1 AND musictbl.clentId = '".$_SESSION['user_id']."'");
                                            if (mysqli_num_rows($query)<=0) {
                                                ?>
                                                    <h1 style="color: red;">No data Founds !</h1>
                                                <?php
                                            } else {
                                              
                                            $number=1;
                                                while ($row1 = mysqli_fetch_array($query)) {
                                                     
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $number;?></td>
                                            <td><?php echo $row1['title'];?></td>
                                            <td><?php echo $row1['valueInAmmount'];?></td>
                                            <td><?php echo $row1['ctitle'];?></td>
                                            <td><?php echo $row1['data'];?></td>
                                        </tr>
                                       
                                    </tbody>
                                    <?php
                                       $number+=1;
                                                }

                                            }
                                       ?>
                                </table>
                            </div>
                        </div>
                        <!-- ends of tables -->

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

     <!-- Page level plugins -->
    <script src="../plugins/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../plugins/js/demo/datatables-demo.js"></script>

</body>

</html>

<?php 
   } 
?>