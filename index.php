<?php
session_start();
$error = "";
$msg = "";
include 'include/condig.php';

// Login condition
if (isset($_POST["loginBtn"])) {
    $emailtxt = $_POST['username'];
    $passtxt = $_POST['password'];
    $hashespas = password_hash($passtxt, PASSWORD_BCRYPT);
    $select = mysqli_query($con, "SELECT * FROM clienttbl WHERE email='" . trim($emailtxt) . "' OR username ='" . trim($emailtxt) . "'") or die(mysqli_error($con));


    if (mysqli_num_rows($select) == 1) {
        $row = mysqli_fetch_array($select);
        $db_password = $row['password'];
        $verified = $row['verified'];
        $email = $row['email'];
        $fname =$row['fname'];
        $lname =$row['lname'];
        $date = $row['date'];
        if (password_verify(mysqli_real_escape_string($con, trim($_POST['password'])), $db_password)) {
            
            if ($verified == 1) {
                    // lest set the sessions here!!!
                $_SESSION['user_id'] = $row['cliID'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['phone'] = $row['phonenumber'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['username'] = $row['username'];
                if (strlen($_SESSION['musicID']) !=0) {
                    header("location: clie/playSearch.php");
                } else {
                   header("location: clie/index.php"); 
                }
                
                
            } else {
                $error = "This Account has not yet Been Verified 
                            and email was set to $email on $date";
            }
            
            
            } 
            else {
            // password does not match
            $error = "Incorrect Password , Please try again later!!";
        }
    } else {
        // password does not match
        $error = "Invalid user credintials , Please try again later!!";
    }
}   //end of login condition


// new account
if (isset($_POST["newaccountbtn"])) {
    $subject = "New Message !";
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $phonenumber = trim($_POST['phone']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $repassword = trim($_POST['rpassword']);
    
    // generate verify key
    $vkey = md5(time().$email);
       
    $select_chech = mysqli_query($con, "SELECT * FROM clienttbl WHERE email='".trim($_POST['email'])."' OR username='".trim($_POST['username'])."'");
    if (mysqli_num_rows($select_chech) > 0) {
        $error="email or User-Name is areald used! try again...";
    }elseif ($password != $repassword) {
        $error ="Password are not Match";
    }
    elseif (mysqli_num_rows($select_chech)==0) { 
        $hashpassword=password_hash($password, PASSWORD_BCRYPT);
        $status=1;
        $verified=0;
        $insert=mysqli_query($con,"INSERT INTO `clienttbl`(`fname`, `lname`, `username`, `email`, `phonenumber`, `password`, `status`,
         `vkey`) VALUES ('$fname','$lname','$username','$email','$phonenumber','$hashpassword','$status','$vkey')");
        if ($insert) {
            $message="Dear ".$fname." ".$lname." has email : '".mysqli_real_escape_string($con, trim($_POST['email']))."'
            <br><br> Your account was created successfully!<br> Regards,<br><br> TelMaker.com <br>
            so Click Here to Verify Your Email 
            <a class='btn btn-primary' href='http://localhost:8080/telmaker/verify.php?vkey=$vkey'>Verify now</a>";
            send_mail($subject,$message,$email);
            $msg ="Now you are account was Created, so Check your Email: ".$email;
        }else {
            $error="There is Something Went Wrong";
        }
    }else {
        $error="email or Phone Aready used!";
    }
}  // end of new Accout
    
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
    <link rel="shortcut icon" href="../plugins/img/logo.png" type="image/x-icon">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php 
            // include 'include/sidebar.php';
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

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h4>
                            Music
                        </h4>

                    </div>

                    <div class="row">

                            <?php
                            $query = mysqli_query($con,"SELECT tblcategory.catid,tblcategory.title as ctitle,tblcategory.AddedBy,
                             musictbl.mid,musictbl.title,musictbl.musicname,musictbl.path,musictbl.thumbnail,musictbl.clentId, 
                             musictbl.valueInAmmount,musictbl.valueInAmmount,musictbl.referece as muReference, musictbl.category,
                             musictbl.status as mustatus FROM musictbl LEFT JOIN tblcategory ON musictbl.category= tblcategory.catid
                              WHERE musictbl.status = 1 ORDER BY RAND() DESC");
                                while ($row1 = mysqli_fetch_array($query)) {
                            ?>
                        <div class="col-lg-4">
                            <div class="card shadow mb-1">
                                <div class="card-body">
                                    <div class="text-center">
                                        <img class="img-fluid px-3 px-sm-0 mt-1 mb-1" style="width: 20rem;"
                                            src="clie/<?php echo $row1['thumbnail'] ;?>" alt="...">
                                    </div>
                                    <h6 class="m-0 font-weight-bold text-dark"
                                        style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;">
                                       <?php echo $row1['title'] ;?>
                                    </h6>
                                    <p
                                        style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; 
                                        color: rgba(0, 0, 0, 1.0); font-size:12px;">
                                        
                                        <?php echo $row1['valueInAmmount']. "  RWF";?> 
                                    </p>

                                    <p
                                        style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden; 
                                        color: rgba(0, 0, 0, 1.0); font-size:12px;">
                                       Category: <?php echo $row1['ctitle'] ;?>
                                    </p>
                                        <button name="logMo" data-toggle="modal" data-target="#loginModalMusic"
                                     style="text-decoration-line: none; font-size:12px;" class="btn btn-primary">
                                     <?php if (isset($_POST['logMo'])) {
                                        $_SESSION['musicID'] = $row1['mid'] ;
                                     } ?>play</button>
                                
                                    
                                </div>
                            </div>
                        </div>

                        <?php
                            }
                        
                        ?>
                        

                    </div> <!-- /.row-->

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


    <!-- Login Modal-->
 <div class="modal fade" id="loginModalMusic" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="POST">
                     <div class="form-group">
                         <input type="text" name="username" required class="form-control form-control-user"
                             id="exampleInputEmail" aria-describedby="emailHelp"
                             placeholder="Enter User-Name Or Email Address...">
                     </div>
                     <div class="form-group">
                         <input type="password" name="password" required class="form-control form-control-user"
                             id="exampleInputPassword" placeholder="Password">
                     </div>
                     <input type="submit" name="loginBtn" value="Login" class="btn btn-primary btn-user btn-block">
                 </form>

                 <hr>
                 <div class="text-center">
                     <a class="small" href="forgot_password.php">Forgot Password?</a>
                 </div>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             </div>
         </div>
     </div>
 </div>
 <!--ends Login Modal-->

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