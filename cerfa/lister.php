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
    

  if (isset($_GET['id']))
  {
    $id = $_GET['id'];
    getDon($id);
  }   

  $fideles = getF();
  $dons = getDon();
  
// Construction de la page Lister
  include($repVues."entete.php") ;
  include($repVues."menu.php") ;
  include($repVues."vLister.php");
  include($repVues."pied.php") ;
  ?>
    
