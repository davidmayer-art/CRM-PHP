<?php
/** 
 * Script de contr�le et d'affichage du cas d'utilisation "Ajouter"
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

// DEBUT du contr�leur ajouter.php
$fideles=getFifi();
$mensualites=getMensualite();
$id_fidele = trim(stripslashes(html($_GET['id_fidele'])));
$civilite=trim(stripslashes(html($_GET['civilite'])));
$nom=trim(stripslashes(html($_GET['nom'])));
$prenom=trim(stripslashes(html($_GET['prenom'])));
$adresse=trim(stripslashes(html($_GET['adresse'])));
$cp=trim(stripslashes(html($_GET['cp'])));
$ville=trim(stripslashes(html($_GET['ville'])));
$pays=trim(stripslashes(html($_GET['pays'])));
$mail=trim(stripslashes(html($_GET['mail'])));
$port=trim(stripslashes(html($_GET['port'])));
$nom_societe=trim(stripslashes(html($_GET['nom_societe'])));
if (count($_POST)==0)
{
  $etape = 1;
}
else 
{
  $etape = 2;
  $civilite = trim(stripslashes(html($_POST['civilite'])));
  $lenom = trim(stripslashes(html($_POST['nom'])));
  $leprenom = trim(stripslashes(html(ucfirst($_POST['prenom']))));
  $leadresse = trim(stripslashes(html($_POST['adresse'])));
  $lecp = trim(stripslashes(html($_POST['cp'])));
  $leville = trim(stripslashes(html(ucfirst($_POST['ville']))));
  $lepays = trim(stripslashes(html(ucfirst($_POST['pays']))));
  $lemail = trim(stripslashes(html($_POST['mail'])));
  $leport = trim(stripslashes(html($_POST['port'])));
  $lenom_societe = trim(stripslashes(html($_POST['nom_societe'])));

    modifier( $lenom, $leprenom, $leadresse, $lecp, $leville, $lepays, $lemail, $leport, $lenom_societe, $tabErreurs);

  header("Location:lister_F.php");

}




// D�but de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
include($repVues."modifier_v.php");
include($repVues."pied.php");
?>
  
