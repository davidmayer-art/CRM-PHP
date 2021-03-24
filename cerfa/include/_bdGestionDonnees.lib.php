<?php

// FONCTIONs POUR L'ACCES A LA BASE DE DONNEES
// Ajouter en têtes 
// Voir : jeu de caractères à la connection

/** 
 * Se connecte au serveur de données                     
 * Se connecte au serveur de données à partir de valeurs
 * prédéfinies de connexion (hôte, compte utilisateur et mot de passe). 
 * Retourne l'identifiant de connexion si succès obtenu, le booléen false 
 * si problème de connexion.
 * @return resource identifiant de connexion
 */
function getBDD() {
  // CONNECTION A LA BDD
  $bdd = new PDO('mysql:host=localhost;dbname=test_form2;charset=utf8', 
    'root', '');
    return $bdd;
}

function getDon() {
  // REQUETE POUR AFFICHER LES FIDELE DE LA BDD 
  $bdd = getBdd();
  $dons = $bdd->query('SELECT f.mail, d.* FROM don d inner join fidele f on d.id_fidele = f.id_fidele order by id_don desc');
  
  return $dons;
}
function getDon1() {
  // REQUETE POUR AFFICHER LES FIDELE DE LA BDD 
  $bdd = getBdd();
  $dons = $bdd->query('SELECT * FROM don WHERE id_don>=1009 order by id_don desc');
  
  return $dons;
}
function getMensualite() {
  // REQUETE POUR AFFICHER LES FIDELE DE LA BDD 
  $bdd = getBdd();
  $mensualite = $bdd->query('SELECT * FROM mensualite');
  
  return $mensualite;
}
function getF() {
  // REQUETE POUR AFFICHER LES FIDELE DE LA BDD 
  $bdd = getBdd();
  $fideles = $bdd->query('SELECT * FROM fidele order by id_fidele desc ');
  
  return $fideles;
}

function getFifi() {
  // REQUETE POUR AFFICHER LES FIDELE DE LA BDD 
  
  $bdd = getBdd();
  $fidele = $bdd->query('SELECT * FROM fidele order by nom asc');
  
  return $fidele;
}

function ajouterF($civilite, $nom, $prenom, $nom_societe, $adresse, $cp, $ville, $pays, $mail, $port, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = getBDD();
 

  //$newDon = $connexion->prepare("INSERT INTO don (id, civilite, nom, prenom, adresse, cp, ville, pays, montant, mtt, mop, date) VALUES(NULL, :civilite, :nom, :prenom, :adresse, :cp, :ville, :pays, :montant, :mtt, :mop, :date)");
  // Créer la requête d'ajout 
  $newFidele= "INSERT INTO fidele"
  ."(id_fidele, civilite, nom, prenom, nom_societe, adresse, cp, ville, pays, mail, port) VALUES (null,'"
  .$civilite."','"
  .$nom."','"
  .$prenom."','"
  .$nom_societe."','"
  .$adresse."','"
  .$cp."','"
  .$ville."','"
  .$pays."','"
  .$mail."','"
  .$port."');";

  // Lancer la requête d'ajout 
  $connexion->query($newFidele); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  
  // var_dump($newFidele);    
}
function ajouter($civilite, $nom, $prenom, $nom_societe, $adresse, $cp, $ville, $pays, $montant, $mop, $mtt, $date_paiement, $debutpaiement, $finpaiement, $id_fidele, $creationDate, &$tabErr)
{
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = getBDD();

  $creationDate = date('Y-m-d H:i:s');

  $newDon="INSERT into don"
  ."(id_don, civilite, nom, prenom, nom_societe, adresse, cp, ville, pays, montant, mtt, mop, date_paiement, debut_paiement, fin_paiement, pdf, id_fidele, date) values (null,'"
  .$civilite."','"
  .$nom."','"
  .$prenom."','"
  .$nom_societe."','"
  .$adresse."',"
  .$cp.",'"
  .$ville."','"
  .$pays."',"
  .$montant.",'"
  .$mtt."','"
  .$mop."','"
  .$date_paiement."','"
  .$debutpaiement."','"
  .$finpaiement."','
  null',".$id_fidele.",'".$creationDate."');";

  // Lancer la requête d'ajout 
  $connexion->query($newDon); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  var_dump($newDon);           
}
function rechercherF($nom, &$tabErr) {
  $bdd = getBDD();
  $fideles = $bdd->query("SELECT * FROM `fidele` WHERE `nom` LIKE'%".$nom."%'");
  /* query renvoie un jeu d'enregistrement (un paquet), le JeuResultat est utilisable qu'avec le fetch 
    Meme logique qu'avec une collection, il faut prendre chaque ligne */
  return $fideles;
}  
function rechercherRefFifi($id, &$tabErr) {
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  } else {
    throw new Exception("ID not found");
  }
  $bdd = getBDD();
  $fideles = $bdd->query( "SELECT * FROM `fidele` WHERE `id` = '".$id."'");
 
  return $fideles;
}
function connecter($nom, $mdp,&$tabErr) {
  // Initialisation de l'identification a échec
    $ligne = false;

  // Ouvrir une connexion au serveur mysql en s'identifiant
   $connexion = getBDD();
  
  // Vérifier que nom et login existent
    $requete="select * from users where login ='".$nom."' and pwd =md5('".$mdp."');";
    $jeuResultat=$connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
    
    $ligne = $jeuResultat->fetch();

    if($ligne)
    {
  // identification réussie
    }
    else
    {
      $message = "Echec de l'identification !!!";
      ajouterErreur($tabErr, $message);
    }
   
  
  // renvoyer les informations d'identification si réussi
    return $ligne;
}       
function signup($nom, $mdp, &$tabErr){
  $connexion = getBDD();
  $requete = "INSERT INTO `users`(`login`, `pwd`, `cat`) VALUES ('".$nom."', md5('".$mdp."'), 'client');";
  $jeuResultat = $connexion->query($requete);
  if ($jeuResultat) {
    $message = "Votre compte a bien ete cree";
    ajouterErreur($tabErr, $message);
  }
  else {
    $message = "Erreur lors de la création du compte";
    ajouterErreur($tabErr, $message);
  }
  //var_dump($requete);
}
function html($string){
  return htmlspecialchars($string, ENT_QUOTES);
}
function modifier( $nom, $prenom, $adresse, $cp, $ville, $pays, $mail, $port, $nom_societe, &$tabErr) {
  // Ouvrir une connexion au serveur mysql en s'identifiant
  $connexion = getBDD();
  $id = html($_GET['id_fidele']);
  
  // Créer la requête d'ajout 
  $requete="UPDATE fidele
        SET nom = '".$nom."', prenom = '".$prenom."',  nom_societe='".$nom_societe."', adresse = '".$adresse."', cp = ".$cp." , ville = '".$ville."' , pays = '".$pays."', mail ='".$mail."', port='".$port."'
        WHERE id_fidele = ".$id.";"; 
  // Lancer la requête d'ajout 
  $connexion->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant
  var_dump($requete);
} 
?>
