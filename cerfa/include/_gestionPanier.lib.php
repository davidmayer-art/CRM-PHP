<?php
/** 
 * Regroupe les fonctions de gestion d'un panier
 * @package default
 * @todo  RAS
 */

/**
 * Ajoute au panier la référence de fleur sélectionnée
 * 
 * Conserve en variable session la référence de la fleur
 * @param string ref de la fleur
 * @return void    
 */
function ajouterPanier($ref) 
{
  if (!isset($_SESSION["panier"])) 
  { 
    $_SESSION["panier"]=array();
  }
  $i = count($_SESSION["panier"]);
  $_SESSION["panier"][$i] = $ref;  

}

/**
 * Obtenir le nombre d'éléments du panier
 * 
 * @return int 
 */
function comptePanier() 
{
  $compte=0;
  if (isset($_SESSION["panier"])) 
  { 
     $compte = count($_SESSION["panier"]);
  } 
  return ($compte);
}


/**
 * Supprimer la fleur passer en GET
 *
 * @param string : référence de la fleur
 * @return void : retrait effectué 
 */
function supprimerPanier($ref) {
  /** 
   * Le probleme dans un panier c'est qu'il s'agit d'un tableau
   * On ne peut pas supprimer l'element d'un tableau en plein milieu on peut supprimer qu'a la fin
   * Il faut deplacer tout les elements du tableau, et supprimer le dernier element du tableau
   */
  array_splice($_SESSION["panier"], array_search($ref, $_SESSION["panier"]), 1);
}

/**
 * Obtenir les références de fleurs du panier
 * 
 * @return array 
 */
function obtenirPanier() 
{
  return ($_SESSION["panier"]);
}

/**
 * supprimer tout les elements du panier
 * 
 * @return void
 */
/*

?>


