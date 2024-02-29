<?php include "header.php";
include "connexionpdo.php";
$action=$_GET['action'];
$num=$_POST['num'];
$libelle=$_POST['libelle'];


if($action == "Modifier"){
    $req=$monPdo->prepare("update auteur set libelle =:libelle where num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
}else{
    $req=$monPdo->prepare("insert into auteur(libelle) values(:libelle)");
    $req->bindParam(':libelle', $libelle);
}
$nb=$req->execute();
$message= $action == "Modifier" ? "modifiée" : "ajoutée";

echo '<div class="container mt-5">';
echo '<div class="row">
       <div class="col mt-5">';

if($nb == 1) {
    echo '<div class="alert alert-success" role="alert">
        L\'auteur a bien été '. $message .' </div>';
}else{
    echo '<div class="alert alert-danger" role="alert">
        L\'auteur n\'a pas été '. $message .' </div>';
}
?>
<a href="listeAuteurs.php" class="btn btn-dark"> Revenir à la liste des auteurs </a>
</div>  


<?php include "footer.php";

?>