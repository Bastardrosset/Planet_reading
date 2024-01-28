 
<div class="container mt-3">
    <div class="row">
        <div class="col-9">
            <h2>Liste des auteurs</h2>
        </div>
        <div class="col-3">
            <a href="index.php?uc=auteurs&action=add">
                <button type="button" class="btn btn-success pe-3"><i class="bi bi-plus-circle"></i>Ajouter un auteur</button>
            </a>
        </div>
    </div>
    <form id="formRecherche" action="index.php?uc=auteurs&action=list" method="post" class="border border-primary rounded p-3 mt-3 mb-3">
        <div class="row">
            <div class="col">
                <input type="text" class='form-control' id='nom' placehoder='Nom de l\'auteur' name='nom' value="<?php echo $nom; ?>">
            </div>
            <div class="col">
                <input type="text" class='form-control' id='prenom' placehoder='Prénom de l\'auteur' name='prenom' value="<?php echo $prenom; ?>">
            </div>
            <div class="col">
                <select name="nationalite" class="form-control">
                    <?php
                    echo "<option value='Toutes'>Toutes les nationalites</option>";
                    foreach ($lesNationalites as $nationalite) {
                        $selection = $nationalite->numero == $nationaliteSel ? 'selected' : '';
                        echo "<option value='".$nationalite->numero."'". $selection.">".$nationalite->libNation."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col">
                <button type="submit" class="btn btn-success btn-block"> Rechercher</button>
            </div>
        </div>
    </form>
    <table class="table table-striped table-hover">
        <thead>
            <tr class="d-flex">
                <th scope="col" class="col-md-2">Numéro</th>
                <th scope="col" class="col-md-3">Nom</th>
                <th scope="col" class="col-md-3">Prénom</th>
                <th scope="col" class="col-md-2">Nationalité</th>
                <th scope="col" class="col-md-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listAuteurs as $auteur){
                    echo "<tr class='d-flex'>";
                    echo "<td class='col-md-2'>$auteur->numero</td>";
                    echo "<td class='col-md-3'>$auteur->nom</td>";
                    echo "<td class='col-md-3'>$auteur->prenom</td>";
                    echo "<td class='col-md-2'>$auteur->libelle</td>";
                    echo "<td class='col-md-2'>
                        <a href='index.php?uc=auteurs&action=update&num=".$auteur->numero."' class='btn btn-success pe-3'>
                            <i class='bi bi-pen'></i>
                        </a>
                        <a href='#deleteModal' data-bs-toggle='modal' data-delete='index.php?uc=auteurs&action=delete&num='".$auteur->numero."' class='btn btn-danger pe-3'>
                            <i class='bi bi-trash'></i>
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
                <p>Voulez vous supprimer cet auteur ?</p>
            </div>
            <div class="modal-footer">
                <a href="" type="button" class="btn btn-primary" id="deleteBtn">Supprimer</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abandonner</button>
            </div>
        </div>
    </div>
</div>
  
