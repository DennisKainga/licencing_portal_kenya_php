<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if($_SERVER["REQUEST_METHOD"]==='POST'){
    $first_name=$_POST['fname'];
    $last_name=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $idno=$_POST['idno'];
    $password=$_POST['passwd'];
    $password_repeat=$_POST['passwd_repeat'];
    
    if($password!=$password_repeat){
        header("Location: ../register.php?mess=no_match");
        exit;
    }
  
    require_once "dbh.inc.php";

    if(empty($first_name) || empty($last_name) || empty($password) || empty($password_repeat) || empty($email || empty($idno))){
        header("Location: ../register.php?mess=empty_inputs");
        exit;
    }

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        header("Location: ../register.php?mess=invalidemail");
        exit;
    }

    if($password!==$password_repeat){
        header("Location: ../register.php?mess=passwordsdonotmatch");
        exit;
    }

    function userexist($pdo,$email,$idno){
        $statement=$pdo->prepare("SELECT * FROM login WHERE email = :email OR idno=:idno");
        $statement->bindValue(":email",$email);
        $statement->bindValue(":idno",$idno);
        $statement->execute();
        $resultdata=$statement->fetchAll(PDO::FETCH_ASSOC);
        if($resultdata){
            return true;
        }
        else{
            return false;
        }
    }

    function createuser($pdo,$first_name,$last_name,$password,$email,$phone,$idno){
        $statement=$pdo->prepare("INSERT INTO login(first_name,last_name,email,login_pwd,idno,phone) VALUES(:first_name,:last_name,:email,:login_pwd,:idno,:phone)");
        // $hashedpwd=password_hash($password,PASSWORD_DEFAULT);
        $statement->bindValue(':first_name',$first_name);
        $statement->bindValue(':last_name',$last_name);
        $statement->bindValue(':login_pwd',password_hash($password,PASSWORD_DEFAULT));
        $statement->bindValue(':email',$email);
        $statement->bindValue(':phone',$phone);
        $statement->bindValue(':idno',$idno);
        $statement->execute();
        header("Location: ../index.php?mess=useradded");
    }
    if(!userexist($pdo,$email,$idno)){
        createuser($pdo,$first_name,$last_name,$password,$email,$phone,$idno);

    }    
    else{
        header("Location: ../register.php?mess=userexists");
        exit;
    }
   
}

else{
    header('Location: ../register.php?mess=error');
}
