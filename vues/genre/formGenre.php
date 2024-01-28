 <div class="container mt-5">
    <h2 class="text-center mb-5"><?php echo $mode ?> un genre</h2>
        <form class="row g-3 needs-validation col-md-6 offset-md-3" action="index.php?uc=genres&action=validForm" method="post">
            <div class="col-12">
                <label for="validationLibelle" class="form-label">Libellé</label>
                <input type="text" class="form-control" id="validationLibelle" name="libelle" placeholder="Saisir le libellé" value="<?php if($mode == "Modifier") {echo $genre->getLibelle();} ?>">
                <div class="valid-feedback">
                    Looks good!
                </div>
            </div>
            <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") {echo $genre->getNum();} ?>" />
            <div class="row mt-3">
                <div class="col-6 mt-4">
                    <a href="index.php?uc=genres&action=list" class="btn btn-warning btn-block" type="submit">Revenir à la liste</a>
                </div>
                <div class="col-6 mt-4">
                    <button class="btn btn-success btn-block" type="submit"><?php echo $mode ?></button>
                </div>
            </div>
        </form>
</div>


