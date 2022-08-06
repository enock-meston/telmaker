 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

     <!-- Sidebar - Brand -->
     <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
         <div class="sidebar-brand-icon rotate-n-15">
             <img class="img-profile rounded-circle" src="plugins/img/logo1.png" style="width: 3rem;">
         </div>
         <div class="sidebar-brand-text mx-3">Tel<sup>Maker</sup></div>
     </a>

     <!-- Divider -->
     <hr class="sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item active">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Home</span></a>
     </li>

     <!-- Divider -->
     <hr class="sidebar-divider">

     <!-- Heading -->
     <div class="sidebar-heading">
         Media
     </div>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true"
             aria-controls="collapseThree">
             <i class="fas fa-fw fa-music"></i>
             <span> Categories Music</span>
         </a>
         <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header"></h6>
                 <?php
                 $ret=mysqli_query($con,"SELECT * from  tblcategory where status=1");
				    while($result=mysqli_fetch_array($ret))
						{
							?>

                 <a class="collapse-item" href="#" title=""><?php echo $result['title'] ;?></a>
                 <?php } ?>

             </div>
         </div>
     </li>




     <!-- Divider -->
     <hr class="sidebar-divider d-none d-md-block">

     <!-- Sidebar Toggler (Sidebar) -->
     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>



 </ul>
 <!-- End of Sidebar -->