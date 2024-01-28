 
<div class="container mt-3">
    <div class="row">
        <div class="col-9">
            <h2>Liste des nationalités</h2>
        </div>
        <div class="col-3">
            <a href="index.php?uc=nationalites&action=add">
                <button type="button" class="btn btn-success pe-3"><i class="bi bi-plus-circle"></i>Ajouter une nationalité</button>
            </a>
        </div>
    </div>
    <form id="formRecherche" action="index.php?uc=nationalites&action=list" method="post" class="border border-primary rounded p-3 mt-3 mb-3">
        <div class="row">
            <div class="col">
                <input type="text" class='form-control' id='libelle' onInput="document.getElementById('formRecherche').submit()" placehoder='Saisir le libellé' name='libelle' value="<?php echo $libelle; ?>">
            </div>
            <div class="col">
                <select name="continent" class="form-control" onChange="document.getElementById('formRecherche').submit()">
                    <?php
                    echo "<option value='Tous'>Tous les continents</option>";
                    foreach ($lesContinents as $continent) {
                        $selection = $continent->getNum() == $continentSel ? 'selected' : '';
                        echo "<option value='".$continent->getNum()."'". $selection.">".$continent->getLibelle()."</option>";
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
                <th scope="col" class="col-md-5">Libellé</th>
                <th scope="col" class="col-md-3">Continent</th>
                <th scope="col" class="col-md-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listOfNationalities as $nationalite){
                    echo "<tr class='d-flex'>";
                    echo "<td class='col-md-2'>$nationalite->numero</td>";
                    echo "<td class='col-md-5'>$nationalite->libNation</td>";
                    echo "<td class='col-md-3'>$nationalite->libContinent</td>";
                    echo "<td class='col-md-2'>
                        <a href='index.php?uc=nationalites&action=update&num=".$nationalite->numero."' class='btn btn-success pe-3'>
                            <i class='bi bi-pen'></i>
                        </a>
                        <a href='#deleteModal' data-bs-toggle='modal' data-delete='index.php?uc=nationalites&action=delete&num='".$nationalite->numero."' class='btn btn-danger pe-3'>
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
                <p>Voulez vous supprimer cette nationalité ?</p>
            </div>
            <div class="modal-footer">
                <a href="" type="button" class="btn btn-primary" id="deleteBtn">Supprimer</a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abandonner</button>
            </div>
        </div>
    </div>
</div>
  
