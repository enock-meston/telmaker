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
                        <h1><?php echo  $_SESSION['musicID'];?></h1>
                        <?php

                                $mid = $_SESSION['musicID'];
                                $searchTEXT = $_POST['searchtxt'];
                                $query=mysqli_query($con,"SELECT tblcategory.catid,tblcategory.title as ctitle,tblcategory.AddedBy,
                             musictbl.mid,musictbl.title,musictbl.musicname,musictbl.path,musictbl.thumbnail,musictbl.clentId, 
                             musictbl.valueInAmmount,musictbl.valueInAmmount,musictbl.referece as muReference, musictbl.category,
                             musictbl.status as mustatus FROM musictbl LEFT JOIN tblcategory ON musictbl.category= tblcategory.catid
                             WHERE musictbl.status =1 AND musictbl.clentId != '".$_SESSION['user_id']."'");
                                while($row1=mysqli_fetch_array($query)){
                                    ?>
                                     <div class="col-lg-4">
                        <div class="card shadow mb-1">
                            <div class="card-body">
                                <div class="text-center">
                                    <img class="img-fluid px-3 px-sm-0 mt-1 mb-1" style="width: 20rem;"
                                        src="<?php echo $row1['thumbnail'] ;?>" alt="...">
                                </div>
                                <h6 class="m-0 font-weight-bold text-dark"
                                    style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                    <?php echo $row1['title'] ;?>
                                </h6>
                                <p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; 
                                        color: rgba(0, 0, 0, 1.0); font-size:12px;">

                                    <?php echo $row1['valueInAmmount']. "  RWF";?>
                                </p>

                                <p style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; 
                                        color: rgba(0, 0, 0, 1.0); font-size:12px;">
                                    Category:  <?php echo $row1['ctitle'] ; echo "encok=";?>
                                </p>
                               

                               <audio id="aud" controls controlsList="nodownload">
                                <source src="php/<?php echo $row1['path'];?>" type="audio/ogg">
                                <source src="php/<?php echo $row1['path'];?>" type="audio/mpeg">
                                Your browser does not support the audio element.
                                </audio>

                                <script type="text/javascript">
                                    var myaud = document.getElementById("aud");
                                    var k = setInterval("pauseAud()", 10000);

                                    function playAud() {
                                        myaud.play();
                                    }

                                    function pauseAud() {
                                        myaud.pause();
                                        // alert('Audio Stop Successfully');
                                        clearInterval(k); 
                                        location.reload();
                                    } 
                                </script> 
<br>
                                <a href="buyAudio.php?id=<?php echo $row1['mid'];?>" class="btn btn-primary"> 
                                <i class="fas fa-fw fa-shopping-cart"></i>Pay</a>
                            </div>
                        </div>
                                     </div>
                        <?php
                                }
                           
                        
                        ?>
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