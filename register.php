<?php include_once "includes/header.php"?>
<body class="bg-light">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card mt-5 mb-3 shadow">
                    <div class="card-header bg-white d-flex flex-column align-items-center">
                  
                        <img src="img/register.png" alt="" srcset="" style="height:80px;">
                        <h3>Create a new account</h3>
                        <div class="w-100 mt-5">
                            <a class="link-primary"href="index.php">Already Have an account? Log in</a>
                        </div>
                    </div>
                    <div class="">
                    <form action="engine/signup.inc.php" method="POST">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID Number</label>
                                    <input type="text" name="idno" class="form-control">
                                </div>
                                <div class="row mb-3">
                                    <div class="col">
                                       
                                        <input type="text" name="fname" class="form-control" placeholder="First name" aria-label="First name">
                                    </div>
                                    <div class="col">
                                    
                                        <input type="text" name="lname" class="form-control" placeholder="Last name" aria-label="Last name">
                                    </div>
                                </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" name="email" class="form-control" placeholder="Email Address" aria-label="First name">
                                </div>
                                <div class="col">
                                 
                                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" aria-label="Last name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                    <div class="col">
                                        <input type="password" name="passwd" class="form-control" placeholder="Password" aria-label="First name">
                                    </div>
                                    <div class="col">
                                        <input type="password" name="passwd_repeat"class="form-control" placeholder="Confirm password" aria-label="Confirm PasswordLast name">
                                    </div>
                            </div>
                          
                        </div>
                        </div>
                     
                    </div>
                    <div class="card-footer w-100">
                            <button class="btn btn-primary w-100" type="submit">Create Account</button>
                    </div>
                  
                       
                    </form>
                </div>
            </div>
        </div>
    </div>

 <?php include_once "includes/footer.php"?>