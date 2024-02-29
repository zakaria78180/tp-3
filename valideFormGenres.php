<?php include "header.php";
include "connexionpdo.php";
$action=$_GET['action'];
$num=$_POST['num'];
$libelle=$_POST['libelle'];


if($action == "Modifier"){
    $req=$monPdo->prepare("update genre set libelle =:libelle where num = :num");;
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
}else{
    $req=$monPdo->prepare("insert into genre(libelle) values(:libelle)");
    $req->bindParam(':libelle', $libelle);
}
$nb=$req->execute();
$message= $action == "Modifier" ? "modifiée" : "ajoutée";

echo '<div class="container mt-5">';
echo '<div class="row">
       <div class="col mt-5">';

if($nb == 1) {
    echo '<div class="alert alert-success" role="alert">
        Le genre a bien été '. $message .' </div>';
}else{
    echo '<div class="alert alert-danger" role="alert">
        Le genre n\'a pas été '. $message .' </div>';
}
?>
<a href="listeGenres.php" class="btn btn-dark"> Revenir à la liste des genres </a>
</div>  


<?php include "footer.php";

?>