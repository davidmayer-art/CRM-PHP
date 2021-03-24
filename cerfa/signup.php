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
    
    
  $don = getDon();
// DEBUT du contr�leur ajouter.php
$ok=FALSE;
if (count($_POST)!=0){
  if ($_POST["pass"] == $_POST["pass_t"]){
    $ok = TRUE;
    signup($_POST["name"], $_POST["pass"], $tabErr);
  } 
  else {
    ?>
    <h1><p class="text-error">OUPS ! Une erreur est survenue.</h1></p>
    <h4><p class="text-info">  Il semble que les mots de passe ne correspondent pas.</h4></p></br>
    <center><h2>Pour reesayer cliquez ici  <a href="signup.php" class="btn btn-danger">S'inscrire</a></h2></center>
    <?php
  }
}

// D�but de l'affichage (les vues)

include($repVues."entete.php");
include($repVues."menu.php");
include($repVues."erreur.php");
if (count($_POST)==0){
  include($repVues."vSignup.php");  
}
if (count($_POST)>=2){
  if ($ok==TRUE){
    if($don ->rowCount()==0){
      header("Location:ajouter.php");
    }else{
      header("Location:lister_F.php");
    }
    ?>
      <h1><p class="text-success">Merci</br>Votre compte a bien ete cree</h1></br></p>
      <center><h2>Pour se connecter cliquez ici  <a href="connecter.php" class="btn btn-success">Se connecter</a></h2></center>
    <?php
  }
}
include($repVues."pied.php");
?>
  
