<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources n�cessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_init.inc.php");
  if(empty($_SESSION['idUser'])) {
    header('location: connecter.php');
    exit();
  }
    
  $fidele = getFifi();
  if (isset($_GET["nom"]))
  {
    $etape = 2;
    $unnom=$_GET["nom"];
    $fideles = rechercherF($unnom, $tabErreurs);
  }
  if (count($_GET)==0)
  {
    $etape = 1;
  }
  else
  {
    $etape = 2;
    $unNom = $_GET['nom'];
    $unnom=$unNom;
  }
  
// Construction de la page Lister
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  if($etape==1)
  {
    include($repVues."lister_fidele.php");
  }
  if($etape==2)
  {
    include($repVues."rechercher_fidele.php");
  } 
  include($repVues."pied.php") ;
  ?>
    
