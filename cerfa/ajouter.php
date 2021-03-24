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
    
  $nom="";
  $prenom="";
  $adresse="";
  $lecp="";
  $laville="";
  $lepays="";

$fideles=getFifi();

// DEBUT du contr�leur ajouter.php
if (count($_POST)==0)
{
  $etape = 1;
}
else 
{
  $etape = 2;
  $civilite = trim(stripslashes(html($_POST['civilite'])));
  $nom = trim(stripslashes(html($_POST['nom'])));
  $prenom = trim(stripslashes(html(ucfirst($_POST['prenom']))));
  $nom_societe = trim(stripslashes(html(ucfirst($_POST['nom_societe']))));
  $adresse = trim(stripslashes(html($_POST['adresse'])));
  $cp = trim(stripslashes(html($_POST['cp'])));
  $ville = trim(stripslashes(html(ucfirst( $_POST['ville']))));
  $pays = trim(stripslashes(html(ucfirst($_POST['pays']))));
  $mail = trim(stripslashes(html($_POST['mail'])));
  $port = trim(stripslashes(html($_POST['port'])));
 

  $tets =ajouterF($civilite, $nom, $prenom, $nom_societe, $adresse, $cp, $ville, $pays, $mail, $port, $tabErreurs);
  // var_dump($tets);
  //ajouter($civilite, $nom, $prenom, $adresse, $cp, $ville, $pays, $montant, $mop, $mtt, $creationDate, $id_fidele, $tabErreurs);
  header("Location:lister_F.php");
  
}




// D�but de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
include($repVues."vAjouterForm.php");
include($repVues."pied.php");
?>
  
