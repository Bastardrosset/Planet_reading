 
<?php 
    include "header.php";
    // include "./models/connexion-DB.php";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['libelle']) && !empty($_POST['libelle'])) {
            $action=$_GET['action'];
            $num = $_POST['num'];
            $libelle = $_POST['libelle'];

            if($action == "Modifier"){
                $req = $pdo->prepare("UPDATE nationalite SET libelle=:libelle WHERE num=:num");
                $req->bindParam(":num", $num);
                $req->bindParam(":libelle", $libelle);
            } else{
                $req = $pdo->prepare("INSERT INTO nationalite(libelle) VALUES(:libelle)");
                $req->bindParam(":libelle", $libelle);
            }
            $nb = $req->execute();
            $message = $action == "Modifier" ? "modifiée" : "ajouter";

            echo '<div class="container mt-3">';
            if ($nb == 1) {
                echo '<div class="alert alert-success" role="alert">
                    La nationalité a bien été ' .$message. '!
                    </div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">
                    Erreur, la nationalité n\'a pas été '.$message.'!
                    </div>';
            }
            echo '<a href="listOfNationalities.php" class="btn btn-primary">Retour à la liste des nationalités</a>';
            echo '</div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                Le champ "libellé" ne peut être vide!
                </div>';
        }
    }

    include "footer.php";
?>

