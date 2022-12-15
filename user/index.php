<?php 
include_once "includes/header.php";
?>

<link rel="stylesheet" href="../css/style.css">

<body>
    <div class="d-flex flex-column align-items-center justify-content-center h-100 w-50">
        <h2 class="mt-5 mb-3 rounded"><i class="fas fa-lock "></i></h2>
        <img class="identity mb-3" src="../img/110x110.jpg" onError="this.onerror=null;this.src='../img/110x110.png';" alt="" srcset="">
        <div class="logged mb-3"><h4><?php echo htmlspecialchars($name)?></h4></div>
        <a href="dashboard.php" class="btn btn-success btn-block w-25 btn-sm">Continue</a>
        <a href="../engine/logout.php" class="btn btn-danger btn-block btn-block w-25 btn-sm">Not you? Log out</a>
    </div>
   <?php include_once "includes/footer.php"?>