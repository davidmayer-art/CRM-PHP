<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Rechercher"
 * @package default
 * @todo  RAS
 */
 
// Initialise les ressources nécessaires au fonctionnement de l'application

  $repVues = './vues/';
  require("./include/_init.inc.php");

  if(empty($_SESSION['idUser'])) {
    header('location: connecter.php');
    exit();
  }
// DEBUT du contrôleur rechercher.php
if (isset($_GET["plaque"]))
{
  $etape = 2;
  $nom=$_GET["nom"];
  $prenom=$_GET["prenom"];
  $fideles = rechercherF($nom, $prenom, $tabErreurs);
}
if (count($_GET)==0)
{
  $etape = 1;
}
else
{
  $etape = 2;
  $fidele = $_GET['nom'];
  $nom=$fidele;
}
  // Construction de la page Lister
  // pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
if($etape==1)
{
  include($repVues."vAjouterForm2.php");
}
if($etape==2)
{
  include($repVues."vRechercherVehicule.php");
}
  
include($repVues."pied.php") ;
?>
    
