<?php
session_start();
include '../include/condig.php';
$msg ="";
$error ="";
error_reporting(0);
if (strlen($_SESSION['user_id']) == 0) {
    header('location: index.php');
} else {


    if (isset($_POST['savebtn'])) {
        $amount = $_POST['valueInAmmount'];
        $categoryID = $_POST['category'];
        $title = $_POST['title'];
        $status = 1;
        $status00 = 0;
        $userID = $_SESSION['user_id'];


           // images
    $img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
	$img_ex_lc = strtolower($img_ex);
    $allowed_exs = array("jpg","png");
    if (in_array($img_ex_lc,$allowed_exs)) {
            $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
			$img_upload_path = 'php/thurmbnail/'.$new_img_name;
             
             if (move_uploaded_file($tmp_name, $img_upload_path)) {
                $imageSize = getimagesize("$img_upload_path");
                // echo $imageSize[0]." and  ". $imageSize[1] ;
				if ($imageSize[0]!=920 AND $imageSize[1] != 482) {
					$error = "Image Must Have Width of 920 pixel AND Heigth of 482 pixel";
				}else{
                $query= mysqli_query($con,"UPDATE `musictbl` SET `title`='$title', `thumbnail`='$img_upload_path',
                `valueInAmmount`='$amount',`category`='$categoryID',`status`='$status' WHERE clentId='$userID' AND status='$status00'");

                if ($query) {
                    $msg ="changes saved";
                } else {
                    $error ="Not Saved";
                }
            }
                
             }else {
                $error ="Not uploaded!";
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

                    <?php
                        $clentId= $_SESSION['user_id'];
                        $status= 0;

                        $SelectOneMusic= mysqli_query($con,"SELECT * FROM `musictbl` WHERE clentId ='$clentId' AND status='$status'");
                        $rowcount=mysqli_num_rows($SelectOneMusic);
                            if($rowcount==0){
                            ?>
                                <h3 style="color:red">No Draft record found</h3>
                            <?php
                            }else {
                             
                        while ($rowOne=mysqli_fetch_array($SelectOneMusic)) {
                        
                    ?>

                    <!-- play video -->

                    <audio controls>
                        <source src="../clie/php/<?php echo $rowOne['path'];?>" type="audio/ogg">
                        <source src="../clie/php/<?php echo $rowOne['path'];?>" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>

                    <form method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="reference" value="<?php echo $reference;?>">
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

                        <div class="form-group">
                            <i class="fas fa-fw fa-quote-left"></i>
                            <label for="">  Thumbanail must have Width of 920 pixel AND Heigth of 482 pixel</label>
                            <i class="fas fa-fw fa-quote-right"></i>
                            <input type="file" name="my_image" required accept=".png,.jpg" class="form-control form-control-user">
                        </div>

                        <button type="submit" class="btn btn-primary" name="savebtn"><i
                                class="fas fa-fw fa-shopping-cart"></i>
                            Save
                        </button>


                    </form>
                    <?php
                            }
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