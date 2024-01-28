<?php
$action=$_GET["action"];
switch($action){
    case "list":
        $libelle="";
        $continentSel="Tous";
        if(!empty($_POST["libelle"]) || !empty($_POST["continent"])){
            $libelle= $_POST["libelle"];
            $continentSel= $_POST["continent"];
        }
        $lesContinents = Continent::findAll();
        $listOfNationalities = Nationalite::findAll($libelle, $continentSel);
        include("./vues/nationalite/listOfNationalities.php");
    break;
    case "add":
        $mode="Ajouter";
        $lesContinents = Continent::findAll();
        include ("./vues/nationalite/formNationalite.php");
    break;
    case "update":
        $mode="Modifier";
        $lesContinents = Continent::findAll();
        $laNationalite = Nationalite::findById($_GET["num"]);
        include ("./vues/nationalite/formNationalite.php");
    break;
    case "delete":
        $laNationalite = Nationalite::findById($_GET['num']);
        $nb=Nationalite::delete($laNationalite);
            if($nb==1){
            $_SESSION['message']=["success"=>"Le nationalite a bien été supprimé"];
            }else{
                $_SESSION['message']=["danger"=>"Le nationalite n'a pas été supprimé"];
            }
            header('location: index.php?uc=nationalites&action=list');
            exit();
        break;
    case "validForm":
        $nationalite = new Nationalite();
        $continent = Continent::findById($_POST["continent"]);
        $nationalite->setLibelle($_POST["libelle"])
                    ->setContinent($continent);
            if(empty($_POST["num"])){// Cas de création
                $nb = Nationalite::add($nationalite);
                $message = "ajouté";
            } else{// Cas de modification
                $nb = Nationalite::update($nationalite);
                $message = "modifié";
            }
            if($nb == 1){
                $_SESSION["message"]=["success"=>"Le nationalite a bien été $message"];
            } else{
                $_SESSION["message"]=["danger"=>"Le nationalite a bien été $message"];
            }
            header("location: index.php?uc=nationalites&action=list");
    break;
}