<?php ob_start(); 
session_start(); 
include "./vues/header.php";   
include "./models/Continent.php";
include "./models/monPdo.php";
include "./vues/messagesFlash.php";

$uc = empty($_GET['uc']) ? "accueil" : $_GET['uc'];
switch($uc){
    case "accueil":
        include("vues/Accueil.php");
        break;
    case "continents":
        include ("./controllers/continentController.php");
        break;    
}

include "vues/footer.php";

