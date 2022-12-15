<?php include_once "includes/header.php";
require_once "../engine/dbh.inc.php";
$statement = $pdo->prepare("SELECT * FROM licence_group");
$statement->execute();
$groups=$statement->fetchAll(PDO::FETCH_ASSOC);

function select_group($pdo,$id){
    $statement = $pdo->prepare("SELECT * FROM sub_groups WHERE gid=:id");
    $statement->bindValue(':id',$id);
    $statement->execute();
    $groups=$statement->fetchAll(PDO::FETCH_ASSOC);
    return $groups;
}
?>


<body id="page-top" class="bg-gradient-light">

            <!-- Navbar start -->
            <div id="content">
                <?php include_once "includes/nav.php"?>



                <!-- Begin Page Content -->
                <div class="container-fluid">
                        <div class="row mt-5">
                            <div class="col-lg-8">
                                <!-- for lop here -->
                                <?php foreach ($groups as $group):{?>
                                <div class="card mb-2">
                                    <div class="card-header w-100"  style="height: 45px;;">
                                    <div class="card-title">
                                    <a class="text-decoration-none text-dark  d-flex justify-content-between" data-bs-toggle="collapse" href="#licence<?php echo $group["id"]?>" role="button" aria-expanded="false" aria-controls="licence">
                                    <?php echo htmlspecialchars($group["title"])?>
                                    <span class=""><i class="fas fa-plus"></i></span>
                                    </a>
                                    </div>
                                    </div>
                                    <div class="collapse" id="licence<?php echo $group["id"]?>">
                                        <div class="card card-body">
                                            <ul class="list-group-numbered">
                                                <?php foreach(select_group($pdo,$group["id"]) as $sub):{?>
                                                <li class="list-group-item"><a href="apply.php?gid=<?php echo $group["id"]?>&sid=<?php echo $sub["id"]?>&title=<?php echo $sub["title"]?>&desc=<?php echo $sub["description"]?>" class="link-primary text-decoration-none"><?php echo htmlspecialchars($sub["title"])?></a></li>
                                                <?php }endforeach;?>
                                              
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php }endforeach; ?>

                              
                               
                            </div>   
                             <!-- user information-->
                            <div class="col-lg-4">
                            <div class=" card shadow-sm" style="max-height:200px;">
                                    <div class="card-body bg-white d-flex align-items-center bg-light">
                                    <img src="../img/avatar2.jpg" alt="" class="mr-4" srcset="" style="border-radius:50%;height:100px;border:0.5px solid rgba(0,0,0,.1);">
                                    <div class="info d-flex flex-column justify-content-evenly">
                                        <h5 class="mt-3">Welcome, <?php echo htmlspecialchars($name)?></h5>
                                        <p class="fs-6 mb-1 fw-light"><span class="badge bg-success text-white"><?php echo htmlspecialchars($email)?></span></p>
                                        <p class="fs-6 mb-1 fw-light"><span class="badge bg-primary text-white"><?php echo htmlspecialchars($idno)?></span></p>
                                        <a class="btn btn-danger text-decoration-none btn-sm mt-3 w-50" href="#" data-toggle="modal" data-target="#logoutModal">Log out</a>
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