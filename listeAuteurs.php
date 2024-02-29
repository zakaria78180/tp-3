<?php include "header.php";
include "connexionpdo.php";
$req=$monPdo->prepare("select * from auteur");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesAuteurs=$req->fetchAll();

if(!empty($_SESSION['message'])){
  $mesMessages=$_SESSION['message'];
  foreach($mesMessages as $key=>$message){
    echo ' <div class="container pt-5">
             <div class="alert alert-'.$key.' alert-dismissible fade show" role="alert">'.$message.'
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
            </button>
          </div>
        </div>';
  }
  $_SESSION['message']=[];
}
?>



<div class="container mt-5">

    <div class="row pt-3">
       <div class="col-9"><h2>Liste des auteurs</h2></div>
       <div class="col-3"><a href="formAuteurs.php?action=Ajouter" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer un auteur</a></div>
    </div>  

<table class="table table-hover table-striped">
<thead>
  <thead class="thead-dark">
    <tr class="d-flex">
    <th scope="col" class="col-md-3">Numéro</th>
    <th scope="col" class="col-md-3">Nom</th>
    <th scope="col" class="col-md-3">Prénom</th>
    <th scope="col" class="col-md-3">Actions</th>
    </tr>
  </thead>
  <tbody>
<?php
    foreach($lesAuteurs as $auteur){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-3'>$auteur->num</td>";
        echo "<td class='col-md-3'>$auteur->nom</td>";
        echo "<td class='col-md-3'>$auteur->prenom</td>";
        echo "<td class='col-md-3'>
        <a href='formAuteurs.php?action=Modifier&num=$auteur->num' class='btn btn-primary'><i class='fas fa-pen'></i></a>
        <a href='#modalSuppression' data-toggle='modal' data-suppression='supprimerAuteur.php?num=$auteur->num' class='btn btn-danger'><i class='fas fa-trash-alt'></i></a>
    </td>";
    echo "</tr>";
    }
?>
  </tbody>
</table>


</div>  
<div id="modalSuppression" class="modal fade" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation de suppression</h5>
      </div>
      <div class="modal-body">
        <p>Voulez-vous supprimer cette auteur ? </p>
      </div>
      <div class="modal-footer">
        <a href=""class="btn btn-primary" id="btnSuppr">Supprimer</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ne pas supprimer</button>
      </div>
    </div>
  </div>
</div>

<?php include "footer.php";

?>