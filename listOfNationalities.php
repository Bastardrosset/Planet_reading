 
<?php 
    include "./vues/header.php";
    // include "./models/connexion-DB.php";
    $req=$pdo->prepare("SELECT * FROM nationalite");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->execute();
    $listOfNationalities=$req->fetchAll();
?>

        <div class="container mt-3">
            <div class="row">
                <div class="col-9">
                    <h2>Liste des nationalités</h2>
                </div>
                <div class="col-3">
                    <a href="formNationality.php?action=Ajouter">
                        <button type="button" class="btn btn-success pe-3"><i class="bi bi-plus-circle"></i>Ajouter une nationalité</button>
                    </a>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr class="d-flex">
                    <th scope="col" class="col-md-2">Numéro</th>
                    <th scope="col" class="col-md-8">Libellé</th>
                    <th scope="col" class="col-md-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach($listOfNationalities as $nationalite){
                        echo "<tr class='d-flex'>";
                        echo "<td class='col-md-2'>$nationalite->num</td>";
                        echo "<td class='col-md-8'>$nationalite->libelle</td>";
                        echo "<td class='col-md-2'>
                            <a href='formNationality.php?action=Modifier&num=$nationalite->num' class='btn btn-success pe-3'><i class='bi bi-pen'></i>
                            </a>
                            <a href='#deleteModal' data-bs-toggle='modal' data-delete='deleteNationality.php?num=$nationalite->num' class='btn btn-danger pe-3'><i class='bi bi-trash'></i>
                            </a>
                        </td>";
                        echo "</tr>";

                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Comfirmation de suppression</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Voulez vous supprimer cette nationalité ?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="" type="button" class="btn btn-primary" id="deleteBtn">Supprimer</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abandonner</button>
                    </div>
                </div>
            </div>
        </div>
        
<?php include "./vues/footer.php";
?>

