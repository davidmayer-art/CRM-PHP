<?php
/** 
 * Script de contrôle et d'affichage du cas d'utilisation "Identifier"
 * @package default
 * @todo  RAS
 */
 
$repInclude = './include/';
$repVues = './vues/';

require($repInclude . "_init.inc.php");
  



// Lance la fonction deconnecter
deconnecter();


// Construction de la page Identifier
// pour l'affichage (appel des vues)
include($repVues."entete.php") ;
include($repVues."menu.php") ;
include($repVues."erreur.php");
include($repVues."vAccueil.php") ;
include($repVues."pied.php") ;
?>