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
$nom_societe=trim(stripslashes(html($_GET['nom_societe'])));
$adresse=trim(stripslashes(html($_GET['adresse'])));
$cp=trim(stripslashes(html($_GET['cp'])));
$ville=trim(stripslashes(html($_GET['ville'])));
$pays=trim(stripslashes(html($_GET['pays'])));
$mail=trim(stripslashes(html($_GET['mail'])));
$port=trim(stripslashes(html($_GET['port'])));
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
  $lenom_societe = trim(stripslashes(html(ucfirst($_POST['nom_societe']))));
  $leadresse = trim(stripslashes(html($_POST['adresse'])));
  $lecp = trim(stripslashes(html($_POST['cp'])));
  $leville = trim(stripslashes(html(ucfirst($_POST['ville']))));
  $lepays = trim(stripslashes(html(ucfirst($_POST['pays']))));
  $lemail = trim(stripslashes(html($_POST['mail'])));
  $leport = trim(stripslashes(html($_POST['port'])));
  $montant = trim(stripslashes(html($_POST['montant'])));
  $mtt = trim(stripslashes(html($_POST['mtt'])));
  $mop = trim(stripslashes(html($_POST['mop'])));
  $ledate_paiement = trim(stripslashes(html($_POST['date_paiement'])));
  $ledebutpaiement = trim(stripslashes(html($_POST['debut_paiement'])));
  $lefinpaiement = trim(stripslashes(html($_POST['fin_paiement'])));
  $le_id_fidele = $id_fidele;
  $creationDate = date('Y-m-d H:i:s');
  if ( $lenom != $nom || $leprenom != $prenom || $lenom_societe != $nom_societe || $leadresse != $adresse || $lecp != $cp || $leville != $ville || $lepays != $pays || $lemail != $mail || $leport != $port ){
    modifier( $lenom, $leprenom, $lenom_societe, $leadresse, $lecp, $leville, $lepays, $lemail, $leport, $tabErreurs);
  }

  $test = ajouter( $civilite, $lenom, $leprenom, $lenom_societe, $leadresse, $lecp, $leville, $lepays, $montant, $mop, $mtt, $ledate_paiement, $ledebutpaiement, $lefinpaiement, $le_id_fidele, $creationDate, $tabErreurs);
  // header("Location:lister.php");

}




// D�but de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
include($repVues."ajouterD_v2.php");
include($repVues."pied.php");
?>
  
