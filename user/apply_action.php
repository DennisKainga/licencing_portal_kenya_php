<?php 
require_once "../engine/dbh.inc.php";
ini_set('display_errors',1);
session_start();

function generateRandomString($length = 25) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

$uid = $_SESSION['uid'];
$gid = $_GET['gid'];
$sid = $_GET['sid'];
$ref_no = 'RN1-'.generateRandomString(7);

$statement=$pdo->prepare("INSERT INTO user_licence(uid,gid,sid,ref_no,date_added) VALUES(:uid,:gid,:sid,:ref_no,:date_added)");
$statement->bindValue(':uid',$uid);
$statement->bindValue(':gid',$gid);
$statement->bindValue(':sid',$sid);
$statement->bindValue(':ref_no',$ref_no);
$statement->bindValue(':date_added',date('Y-m-d'));
$statement->execute();
header("Location: dashboard.php?mess=sucess");

?>