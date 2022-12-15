<?php

function security_error($mess,$pdo){
    unset($pdo);
    header("Location: ../index.php?mess=$mess");
    exit;
}

function success_redirect($rank,$pdo){
    unset($pdo);
    header("Location: ../$rank/index.php");
    exit;
}

function verify_inputs($input_password,$username){
    //This will check to verify password no blank submissions on form retun true if not empty
    if(empty($input_password) || empty($username)){
        return false;
    }else{
        return true;
    }
}

//This function will return data if any col matches email or id number provided else returns false
function check_user($pdo,$username){
    $statement=$pdo->prepare("SELECT * FROM login WHERE email=:email OR idno=:idno");
    $statement->bindValue(":email",$username);
    $statement->bindValue(":idno",$username);
    $statement->execute();
    $resultdata=$statement->fetch(PDO::FETCH_ASSOC);
    if($resultdata){
        return $resultdata;
    }
    else{
        return false;
    }
}


//This verifies is password of selected user is correct
function verify_password($hashed,$input_password){
    if(password_verify($input_password,$hashed)){
        return true;

    }
    else{
        return false;

    }
}

function startUserSession($userdata,$input_password){
    if(verify_password($userdata["login_pwd"],$input_password)){
        session_start();
        $name=$userdata["first_name"].' '.$userdata["last_name"];
        $_SESSION['name']=$name;
        $_SESSION['idno']=$userdata['idno'];
        $_SESSION['email']=$userdata['email'];
        $_SESSION['uid']=$userdata['id'];
        $_SESSION['rank']=$userdata['rank'];
        return $userdata["rank"];

    }else{
        return False;
    }
}

//DRIVER CODE

if($_SERVER['REQUEST_METHOD']=='POST'){
    require_once "dbh.inc.php";
    $username=$_POST['username'];
    $input_password=$_POST['password'];

    if(verify_inputs($input_password,$username)){
        $UserResult=check_user($pdo,$username);
        if($UserResult){
            $UserRank=startUserSession($UserResult,$input_password);
            if($UserRank){
                if($UserRank=="user"){
                    success_redirect('user',$pdo);
                }else if($UserRank=="admin"){
                    success_redirect('admin',$pdo);
                }else{
                    security_error('contactus',$pdo);

                }
            }else{
                security_error('wrongpwd',$pdo);
            }
        }else{
            security_error('nouser',$pdo);

        }
    
    }else{
        security_error('emptyinputs',$pdo);
    }
      
}

?>