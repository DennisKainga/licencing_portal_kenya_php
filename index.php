<?php include_once "includes/header.php"?>
<?php include_once "includes/toast.php"?>
<body class="">
    <div class="container-fluid">
    <!-- <div class="toast" id="myToast">
        <div class="toast-header">
            <strong class="me-auto"><i class="bi-gift-fill"></i> We miss you!</strong>
            <small>10 mins ago</small>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            It's been a long time since you visited us. We've something special for you. <a href="#">Click here!</a>
        </div>
    </div> -->
    
        <div class="row justify-content-center">
            
            <div class="col-lg-4">
                
                <div class="card mt-5 shadow">
                    <div class="card-header bg-white d-flex flex-column align-items-center">
                        <img src="img/login.png" alt="" srcset="">
                        <h1>Log in</h1>
                        <p>Licencing Services</p>
                    </div>
                    <div class="card-body">

                    <form method="POST" action="engine/login.inc.php">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email Address or ID Number</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <!-- <div class="mb-1 form-check">
                        <a class="link-primary"href="#">Forgot Password ?</a>
                        </div> -->
                        <div class="">
                        <a class="link-primary"href="register.php">No account? Create a new account</a>
                        </div>
                        </div>
                        <div class="card-footer w-100">
                                <button class="btn btn-success w-100" type="submit">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   <?php include_once "includes/footer.php"?>