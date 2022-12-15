
<?php include_once "includes/header.php";

ini_set('display_errors',1);
require_once "../engine/dbh.inc.php";
$statement = $pdo->prepare("SELECT * FROM licence_group ORDER BY id DESC");
$statement->execute();
$groups = $statement->fetchAll(PDO::FETCH_ASSOC);
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title=$_POST["title"];
    $statement=$pdo->prepare("INSERT INTO licence_group(title) VALUES(:title)");
    $statement->bindValue(":title",$title);
    $statement->execute();
    header("Refresh:0");
}
?>

<body id="page-top" class="bg-gradient-light">

            <!-- Navbar start -->
            <div id="content">
                <?php include_once "includes/nav.php"?>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                      
                    <!-- end of profile row -->

                      <!-- START table information -->
                        <div class="row mt-lg-3">
                            <div class="col-lg-7 mb-4">
                                <div class="card bg-white shadow-sm">
                                <div class="mb-2 d-flex justify-content-between align-center mt-4 mr-2">
                                    <div class="info ml-3">
                                        <h4 class="fw-light">Licence Classes</h4>
                                        <p class="fw-light">Click on view to see the list of available licences in each</p>
                                    </div>
                                    <!-- <div class="mr-3">
                                        <a class="btn btn-primary btn-sm" href="#">Add new</a>
                                    </div> -->
                                </div>
                                <div class="card-body">
                                        <table class="table W-100" id="dataTable" cellspacing="0">
                                            <thead >
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($groups as $i=>$group):{?>
                                            <tr class="w-25">
                                                <td><?php echo $i+1?></td>
                                                <td class="text-wrap w-25"><?php echo htmlspecialchars($group["title"])?></td>
                                                <td><a href="view.php?gid=<?php echo $group["id"]?>" class="btn btn-success">View</a></td>
                                               
                                            </tr>    
                                            <?php }endforeach; ?>                                  
                                            </tbody>
                                        </table>
                                    </div>
                                 </div>
                            </div>

                            <!-- START OF IMPORTANT LINKS -->
                            <div class="col-lg-5">
                                <div class="card shadow-sm">
                                    <div class="card-body">
                                <form method="POST" action="">
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Licence Group title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                   
                                    </div>
                                    <div class="card-footer w-100">
                                            <button class="btn btn-secondary w-50" type="submit">Add new</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            </div>
                            <!-- END OF IMPORTANT LINKS -->
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