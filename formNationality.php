 
<?php 
    include "header.php";
    
    $action=$_GET['action']; // Soit Ajouter, soit Modifier
    if($action == "Modifier"){
        // include "./models/connexion-DB.php";
        $num=$_GET['num'];
        $req=$pdo->prepare("SELECT * FROM nationalite WHERE num=:num");
        $req->setFetchMode(PDO::FETCH_OBJ);
        $req->bindParam(":num", $num);
        $req->execute();
        $numOfNationalitie=$req->fetch();
        // var_dump($numOfNationalitie);
    }
?>

    <div class="container mt-5">
            <h2 class="text-center mb-5"><?php echo $action ?> une nationalité</h2>
            <form class="row g-3 needs-validation col-md-6 offset-md-3" action="validateFormNationality.php?action=<?php echo $action ?>" method="post">
                <div class="col-12">
                    <label for="validationLibelle" class="form-label">Libellé</label>
                    <input type="text" class="form-control" id="validationLibelle" name="libelle" placeholder="Saisir le libellé" value="<?php if($action == "Modifier") {echo $numOfNationalitie->libelle;} ?>">
                    <div class="valid-feedback">
                    Looks good!
                    </div>
                </div>
                <input type="hidden" id="num" name="num" value="<?php if($action == "Modifier") {echo $numOfNationalitie->num;} ?>" />
                <div class="row mt-3">
                    <div class="col-6 mt-4">
                        <a href="listOfNationalities.php" class="btn btn-warning btn-block" type="submit">Revenir à la liste</a>
                    </div>
                    <div class="col-6 mt-4">
                        <button class="btn btn-success btn-block" type="submit"><?php echo $action ?></button>
                    </div>
                </div>
            </form>
    </div>

<?php include "footer.php";
?>

