<?php include "header.php";
include "connexionpdo.php";
$num=$_GET['num'];

    $req=$monPdo->prepare("delete from auteur where num = :num");
    $req->bindParam(':num', $num);
    $nb=$req->execute();

if($nb == 1) {
     $_SESSION['message']=["success"=>"L'auteur a bien été supprimée"];
}else{
     $_SESSION['message']=["danger"=>"L'auteur n'a pas été supprimée"];
}
header('location: listeAuteurs.php');
exit();
?>
 