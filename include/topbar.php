 <!-- Topbar -->
 <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
     <a class="navbar-brand" href="#">TalMaher</a>
     <!-- Sidebar Toggle (Topbar) -->
     <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3" data-toggle="collapse"
         data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
         aria-label="Toggle navigation">
         <i class="fa fa-bars"></i>
     </button>

     <div class="collapse navbar-collapse" id="navbarNavDropdown">
         <ul class="navbar-nav">
             <li class="nav-item active">
                 <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
             </li>
             <?php
                 $ret=mysqli_query($con,"SELECT * from  tblcategory where status=1");
				    while($result=mysqli_fetch_array($ret))
						{
							?>
             <li class="nav-item">
                 <a class="nav-link"
                     href="indexse.php?ca=<?php echo $result['catid'] ;?>"><?php echo $result['title'] ;?></a>
             </li>
             <?php } ?>


         </ul>
     </div>
     <!-- Topbar Search -->
     <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
         <div class="input-group">
             <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                 aria-label="Search" aria-describedby="basic-addon2">
             <div class="input-group-append">
                 <button class="btn btn-primary" type="button">
                     <i class="fas fa-search fa-sm"></i>
                 </button>
             </div>
         </div>
     </form>
     <!-- Topbar Navbar -->
     <ul class="navbar-nav ml-auto">

         <!-- Nav Item - Search Dropdown (Visible Only XS) -->
         <li class="nav-item dropdown no-arrow d-sm-none">
             <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                 <i class="fas fa-search fa-fw"></i>
             </a>
             <!-- Dropdown - Messages -->
             <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                 aria-labelledby="searchDropdown">
                 <form class="form-inline mr-auto w-100 navbar-search">
                     <div class="input-group">
                         <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                             aria-label="Search" aria-describedby="basic-addon2">
                         <div class="input-group-append">
                             <button class="btn btn-primary" type="button">
                                 <i class="fas fa-search fa-sm"></i>
                             </button>
                         </div>
                     </div>
                 </form>
             </div>
         </li>


         <!--  -->
         <div class="topbar-divider d-none d-sm-block"></div>

         <!-- Nav Item - User Information -->
         <li class="nav-item dropdown no-arrow">
             <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                 aria-haspopup="true" aria-expanded="false">
                 <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                 <img class="img-profile rounded-circle" src="plugins/img/undraw_profile.svg" title="Account">
             </a>
             <!-- Dropdown - User Information -->
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#loginModal">
                     <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                     Login
                 </a>

                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#NewAccountModal">
                     <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                     Create Account
                 </a>

             </div>
         </li>

     </ul>

 </nav>
 <!-- End of Topbar -->




 <!-- Login Modal-->
 <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Loginnnn</h5>
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



 <!-- new Account Modal -->
 <div class="modal fade" id="NewAccountModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">New account </h5>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                 </button>
             </div>
             <div class="modal-body">
                 <div class="card-body">
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
                                 <input type="text" name="username" required class="form-control form-control-user"
                                     id="exampleLastName" placeholder="User-Name">
                             </div>
                         </div>
                         <div class="form-group">
                             <input type="text" name="email" required class="form-control form-control-user"
                                 id="exampleInputEmail" placeholder="Email Address">
                         </div>
                         <div class="form-group row">
                             <div class="col-sm-6 mb-3 mb-sm-0">
                                 <input type="password" name="password" required class="form-control form-control-user"
                                     id="exampleInputPassword" placeholder="Password">
                             </div>
                             <div class="col-sm-6">
                                 <input type="password" name="rpassword" required class="form-control form-control-user"
                                     id="exampleRepeatPassword" placeholder="Repeat Password">
                             </div>
                         </div>

                         <div class="form-group">
                             <input type="submit" class="btn btn-primary btn-user btn-block" value="save"
                                 name="newaccountbtn">
                         </div>
                     </form>

                 </div>
             </div>
             <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
             </div>
         </div>
     </div>
 </div>
 <!--end of new acount modal  -->