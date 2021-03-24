<?php

require("./include/_init.inc.php");
if(empty($_SESSION['idUser'])) {
    header('location: connecter.php');
    exit();
  }
    
// $select = $pdo->prepare('
// SELECT *
// FROM fidele
// ');

// $select->setFetchMode(PDO::FETCH_ASSOC);
// $select->execute();
$bdd = getBdd();
$select = $bdd->query('SELECT * FROM fidele order by id_fidele desc');



$newReservations = $select->fetchAll();

$excel = "";
$excel .=  "Civilite\tNom\tPrenom\tNom Societe\tAdresse\tCode postal\tVille\tPays\tMail\tPortable\n";

foreach($newReservations as $row) {
    $excel .= "$row[civilite]\t$row[nom]\t$row[prenom]\t$row[nom_societe]\t$row[adresse]\t$row[cp]\t$row[ville]\t$row[pays]\t$row[mail]\t$row[port]\n";
}
header('Content-Encoding: UTF-8');
header("Content-type: application/vnd.ms-excel;charset=UTF-8");
header("Content-disposition: attachment; filename=liste-donnateur".date('d-m-Y').".xls");

print $excel;
exit;


?>