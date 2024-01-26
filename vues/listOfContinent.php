<div class="container mt-3">
    <div class="row">
        <div class="col-9">
            <h2>Liste des continents</h2>
        </div>
        <div class="col-3">
            <a href="index.php?uc=continents&action=add">
                <button type="button" class="btn btn-success pe-3"><i class="bi bi-plus-circle"></i>Ajouter une continents</button>
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
                    foreach($lesContinents as $continent){
                        echo "<tr class='d-flex'>";
                        echo "<td class='col-md-2'>".$continent->getNum()."</td>";
                        echo "<td class='col-md-8'>".$continent->getLibelle()."</td>";
                        echo "<td class='col-md-2'>
                            <a href='index.php?uc=continents&action=update&num=".$continent->getNum()."' class='btn btn-success pe-3'><i class='bi bi-pen'></i>
                            </a>
                            <a href='#deleteModal' data-bs-toggle='modal' data-delete='index.php?uc=continents&action=delete&num=".$continent->getNum()."' class='btn btn-danger pe-3'><i class='bi bi-trash'></i>
                            </a>
                        </td>";
                        echo "</tr>";

                    }
                    ?>
                </tbody>
            </table>
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
                        <p>Voulez vous supprimer ce continent ?</p>
                    </div>
                    <div class="modal-footer">
                        <a href="" type="button" class="btn btn-primary" id="deleteBtn">Supprimer</a>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Abandonner</button>
                    </div>
                </div>
            </div>
        </div>
</div>