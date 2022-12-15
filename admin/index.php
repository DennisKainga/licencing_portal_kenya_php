
<?php include_once "includes/header.php";

ini_set('display_errors',1);
require_once "../engine/dbh.inc.php";
$statement = $pdo->prepare("SELECT * FROM login ORDER BY id DESC");
$statement->execute();
$users = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<body id="page-top" class="bg-gradient-light">

            <!-- Navbar start -->
            <div id="content">
                <?php include_once "includes/nav.php"?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-8 mb-sm-4 h-100">
                                <div class="card shadow-sm bg-white bg-light text-dark">
                                    <div class="d-flex card-body justify-content-evenly">    
                                    <img src="../img/avatar2.jpeg" class="align-self-center border border-dark" style="height:100px;width:100px;border-radius:50%;" >
                                    <!-- style="height:80px;width:80px;border-radius:50%;border:0.5px solid rgba(0,0,0,.1);" -->
                                        <div class="info ml-4">
                                            <strong><h4 class="mt-3 fw-light">Welcome, <?php echo htmlspecialchars($name)?></h4></strong>
                                            <p class="fw-light mt-2">You have logged in as the system administrator</p>
                                            <div class="">
                                                <a class="btn btn-success btn-sm" href="404.php">My Profile</a>
                                                <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#logoutModal">Log Out</a>
                                            </div>
                                        </div>
                                    </div>  
                                </div>    
                            </div>   
                             
                            <div class="col-lg-4 mb-sm-4">
                                <div class="card shadow-sm h-100 rounded-0">
                                    <div class="card-body bg-white bg-light">
                                        <div class="text fw-light">
                                            <h4 class="fw-light">Actions</h4>
                                            <div class="">
                                                <a class="btn btn-primary btn-sm" href="add_group.php">Add license group</a>
                                                <a class="btn btn-secondary btn-sm" href="#">View Users</a>
                                            </div>   
                                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- end of profile row -->

                      <!-- START table information -->
                        <!-- <div class="row mt-lg-3"> -->
                            <div class="col-lg-12 mb-4">
                                <div class="card bg-white shadow-sm">
                                <div class="mb-2 d-flex justify-content-between align-center mt-4 mr-2">
                                    <div class="info ml-3">
                                        <h4 class="fw-light">Site Users</h4>
                                        <p class="fw-light">Below are a list of users who have</p>
                                    </div>
                                    <!-- <div class="mr-3">
                                        <a class="btn btn-primary btn-sm" href="#">Add new</a>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                        <table class="table" id="dataTable">
                                            <thead >
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>ID Number</th>
                                                    <th>Rank</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($users as $user):{?>
                                            <tr class="w-25">
                                                <td class="text-wrap w-25"><?php echo htmlspecialchars($user["first_name"].' '.$user["last_name"])?></td>
                                                <td class="text-wrap"><a class="link-primary" href="#"><?php echo $user["email"]?></a></td>
                                                <td><span class="badge bg-success pill text-white"><?php echo $user["phone"]?></span></td>
                                                <td class="text-wrap"><span class="badge bg-primary text-white"><?php echo $user["idno"]?></span></td>
                                                <td><?php echo htmlspecialchars($user["rank"])?></td>
                                            </tr>    
                                            <?php }endforeach; ?>                                  
                                            </tbody>
                                        </table>
                                    </div>
                                 </div>
                            </div>
                            <!-- START OF IMPORTANT LINKS -->

                            <!-- <div class="col-lg-4">
                                <div class="card shadow-sm">
                                    <div class="card-body bg-white bg-light">
                                        <div class="text">
                                            <h5 class="fw-lighter">Quick Links</h5>
                                        <ul class="link">
                                            <li><a class="link-primary fw-lighter" href="#">Department of Immigration</a></li>
                                            <li><a class="link-primary fw-lighter" href="#">Ministry of Lands</a></li>
                                            <li><a class="link-primary fw-lighter" href="#">Office of the attorney general</a></li>
                                            <li><a class="link-primary fw-lighter" href="#">Mombasa County</a></li>
                                        </ul>  
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- END OF IMPORTANT LINKS -->
                        <!-- </div> -->
                </div>
            </div>
       
    </div>  
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
   <?php include_once "includes/modal.php"?>

  <?php include_once "includes/footer.php"?>