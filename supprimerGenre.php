<?php include "header.php";
include "connexionpdo.php";
$num=$_GET['num'];

    $req=$monPdo->prepare("delete from genre where num = :num");;
    $req->bindParam(':num', $num);
    $nb=$req->execute();

if($nb == 1) {
     $_SESSION['message']=["success"=>"Le genre a bien été supprimée"];
}else{
    $_SESSION['message']=["danger"=>"Le genre n'a pas été supprimée"];
}
header('location: listeGenres.php');
exit();
?>
  