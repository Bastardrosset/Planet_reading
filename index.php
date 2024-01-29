<?php ob_start(); 
session_start(); 
include "./vues/header.php";   
include "./models/Continent.php";
include "./models/Livre.php";
include "./models/Auteur.php";
include "./models/Nationalite.php";
include "./models/Genre.php";
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
    case "nationalites":
        include ("./controllers/nationaliteController.php");
        break;    
    case "genres":
        include ("./controllers/genreController.php");
        break;    
    case "auteurs":
        include ("./controllers/auteurController.php");
        break;    
    case "livres":
        include ("./controllers/livreController.php");
        break;    
}

include "vues/footer.php";

