
<?php include_once "includes/header.php"?>
<body id="page-top" class="bg-gradient-light">

            <!-- Navbar start -->
            <div id="content">
                <?php include_once "includes/nav.php"?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="row">
                            <div class="col-lg-7 mb-sm-4 h-100">
                                <div class="card shadow-sm bg-white bg-light text-dark">
                                    <div class="card-header">
                                        <h5><?php echo htmlspecialchars($_GET["title"])?></h5> 
                                       
                                    </div>
                                    <div class="d-flex flex-column card-body justify-content-evenly">    
                                    <!-- style="height:80px;width:80px;border-radius:50%;border:0.5px solid rgba(0,0,0,.1);" -->
                                        <div class="info ml-4">
                                           <p><?php echo htmlspecialchars($_GET["desc"])?></p>
                                        </div>
                                        <a class="btn btn-success btn-sm w-25" href="apply_action.php?gid=<?php echo $_GET["gid"]?>&sid=<?php echo $_GET["sid"]?>">Apply Now</a>
                                    </div>  
                                  
                                        </div>
                                </div>    
    
                             
                            <div class="col-lg-4 mb-sm-4">
                                
                                <div class="card shadow-sm h-100 rounded-0">
                                    <div class="card-body bg-white bg-light">
                                        <div class="text fw-light">
                                            <h4 class="fw-light">Need Help ?</h4>
                                            <p class="">+254 709 932 300<br>+254 709 932 300</p>            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>                      
                </div>
            </div>
       
    </div>  
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
   <?php include_once "includes/modal.php"?>

  <?php include_once "includes/footer.php"?>