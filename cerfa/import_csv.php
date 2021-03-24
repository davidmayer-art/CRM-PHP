<?php
$repInclude = './include/';
$repVues = './vues/';
require("./include/_init.inc.php");
include($repVues."entete.php") ;
include($repVues."menu.php") ;
if(empty($_SESSION['idUser'])) {
    header('location: connecter.php');
    exit();
}
$bdd = getBdd();
if(isset($_POST["Import"])){
    
    $filename=$_FILES["file"]["tmp_name"];    
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ";")) !== FALSE)
           {
            $getData = array_map("utf8_encode", $getData); //added
             $sql = "INSERT into fidele (id_fidele, civilite, nom, prenom, nom_societe, adresse, cp, ville, pays, mail, port) 
                   values (null,'".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$getData[5]."','".$getData[6]."','".$getData[7]."','".$getData[8]."','".$getData[9]."')";
                echo $sql;
                $result = $bdd->query($sql);
        if(!isset($result))
        {
          echo "<script type=\"text/javascript\">
              alert(\"Invalid File:Please Upload CSV File.\");
              window.location = \"index.php\"
              </script>";    
        }
        else {
            echo "<script type=\"text/javascript\">
            alert(\"CSV File has been successfully Imported.\");
            window.location = \"lister_F.php\"
          </script>";
        }
           }
      
           fclose($file);  
     }
  }
include($repVues."erreur.php") ;
include($repVues."vImportCsv.php") ;
include($repVues."pied.php") ;
?>