<?php 
error_reporting(E_ALL); 
ini_set("display_errors", 1);
header("Content-type: text/html; charset=ISO-8859-1");
require('fpdf/fpdf.php'); 
require("./include/_init.inc.php");
//require('fpdf/ChiffresEnLettres.php');


    // le mettre au debut car plante si on declare $mysqli avant !
    $pdf = new FPDF( 'P', 'mm', 'A4' ,true,'UTF-8', false);

    // on declare $mysqli apres !
    $mysqli = new mysqli('localhost', 'root', '', 'test_form2');
    // cnx a la base
    mysqli_select_db($mysqli, 'test_form2') or die('Erreur de connection � la BDD : ' .mysqli_connect_error());

    
    $id = $_GET['id_don'];

    // on sup les 2 cm en bas
    $pdf->SetAutoPagebreak(False);
    $pdf->SetMargins(0,0,0);

    // nb de page pour le multi-page : 18 lignes
    $sql = 'select count(*) FROM don where id_don=1';
    $result = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
    $row_client = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $nb_page = $row_client[0];
    $sql = 'select abs(FLOOR(-' . $nb_page . '/18))';
    $result = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
    $row_client = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $nb_page = $row_client[0];

    $sql1 = 'select * FROM don';
    $result = mysqli_query($mysqli, $sql1)  or die ('Erreur SQL : ' .$sql1 .mysqli_connect_error() );
    $row_don = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $don = $row_don[0];
    

    $num_page = 1; $limit_inf = 0; $limit_sup = 18;
    While ($num_page <= $nb_page)
    {
        $pdf->AddPage();
        $pdf->Image('assets/img/cerfa.png', 24 , 13, 33 ,23);
        $pdf->SetXY( 50, 15 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 110, 7,utf8_decode( "Reçu dons aux oeuvres:"), 0, 1, 'C');
        $pdf->SetXY( 50, 20 ); $pdf->SetFont('Arial','',9); $pdf->Cell( 110, 7, utf8_decode("(Articles 200 et 238 bis du Code général des impôts)"), 0, 1, 'C');
        
        $select = 'select * FROM don where id_don='.$id;
        $result = mysqli_query($mysqli, $select)  or die ('Erreur SQL : ' .$select .mysqli_connect_error() );
        
        
        while ($data =  mysqli_fetch_assoc($result))
        { 
            if ($data['nom']!="" or $data['prenom']!=""){
                $nom_file = utf8_encode("Cerfa_".date("Y")."_".$data['nom']."_".$data['prenom']."_".$data['id_don'].".pdf");
            }
            else {
                $nom_file = utf8_encode("Cerfa_".date("Y")."_".$data['nom_societe']."_".$data['id_don'].".pdf");
            }
             
            // Lancer la requête d'ajout 
            // ***********************
            // le cadre des articles
            // ***********************
            $pdf->Line(20, 55, 190, 55);
            $pdf->Line(20, 55, 20, 125);  $pdf->Line(190, 55, 190, 125);
            $pdf->Line(20, 125, 190, 125);
            // titre colonne
            $pdf->SetXY( 155, 30 ); $pdf->SetFont('Arial','B',10); $pdf->MultiCell( 110, 7, utf8_decode("N° d'ordre du reçu :\n               "), 0, 1, '');
            $pdf->SetXY( 164, 35 ); $pdf->SetFont('Arial','B',10); $pdf->MultiCell( 110, 7, date('Y').' - '.$data['id_don'] , 0, 1, '');
            $pdf->Line(153, 30, 190, 30);
            $pdf->Line(153, 30, 153, 42);  $pdf->Line(190, 30, 190, 42);
            $pdf->Line(153, 42, 190, 42);
            $pdf->SetXY( 68, 57 ); $pdf->SetFont('Arial','B',9); $pdf->Cell( 70, 10, utf8_decode("Bénéficiaire des versements"), 0, 1, 'C');
            $pdf->SetXY( 20, 70 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 22, 10, utf8_decode("Nom :"), 0, 1, 'C'); $pdf->SetXY( 88, 72 ); $pdf->SetFont('Arial','B',14); $pdf->Cell( 40, 10, utf8_decode("Association Méorot HaDaf HaYomi - A.M.D.Y."), 0, 1, 'C');
            $pdf->SetXY( 24, 85 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 20, 10, "Adresse :", 0, 1, 'C'); $pdf->SetXY( 86, 87 ); $pdf->SetFont('Arial','',13); $pdf->Cell( 40, 10, utf8_decode("2 rue Antoine Etex - 94000 CRETEIL"), 0, 1, 'C');
            $pdf->SetXY( 24, 98 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 15, 10, "Objet :", 0, 1, 'C'); $pdf->SetXY( 50, 102 ); $pdf->SetFont('Arial','B',10); $pdf->MultiCell( 145, 5, utf8_decode("  PROMOTION DE L'ENSEIGNEMENT ET DE LA CULTURE TALMUDIQUE."), 0, 1, '');
            $pdf->SetXY( 48, 115 ); $pdf->SetFont('Arial','B',8); $pdf->MultiCell( 140, 3, utf8_decode("Association culturelle et de bienfaisance autorisée à recevoir des dons et legs par le Préfet\nde police du Val-de-Marne - Journal officiel du 03 décembre 2005 art. 1946."), 0, 1, ''); 
            $pdf->Line(20, 130, 190, 130);
            $pdf->Line(20, 130, 20, 170);  $pdf->Line(190, 130, 190, 170);
            $pdf->Line(20, 170, 190, 170);
            $pdf->SetXY( 68, 130 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 70, 10, "Donateur", 0, 1, 'C');
            $x = 10 ;
            if ($data['nom_societe']!= "" or !isset($data['nom_societe']) or !empty($data['nom_societe'])){
                if ($data['nom']=="" && $data['prenom']==""){
                    $pdf->SetXY( 8, 138 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 60, 10, "Nom Societe :", 0, 1, 'C');$pdf->SetXY( 20, 138 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 120, 10,"Ste. "." ".$data['nom_societe'], 0, 1, 'C');
                }else{
                    $pdf->SetXY( 2, 138 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 60, 10, "Nom :", 0, 1, 'C');$pdf->SetXY( 20, 138 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 100, 10,$data['civilite']."  ".$data['nom']."  ".$data['prenom'], 0, 1, 'C');
                    $pdf->SetXY( 90, 138 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 60, 10, "Nom Societe :", 0, 1, 'C');$pdf->SetXY( 90, 138 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 130, 10,$data['nom_societe'], 0, 1, 'C');
                }
            }else{
                $pdf->SetXY( 2, 138 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 60, 10, "Nom :", 0, 1, 'C');$pdf->SetXY( 20, 138 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 110, 10,$data['civilite']."  ".$data['nom']." ".$data['prenom'], 0, 1, 'C');
            }
            $pdf->SetXY( 2, 148 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 66, 10, "Adresse :", 0, 1, 'C');$pdf->SetXY( 30, 148 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 150, 10,$data['adresse'], 0, 1, 'C');
            $pdf->SetXY( 2, 158 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 73, 10, "Code Postal :", 0, 1, 'C');$pdf->SetXY( 30, 158 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 60, 10,$data['cp'], 0, 1, 'C');$pdf->SetXY( 60, 158 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 83, 10, "Commune :", 0, 1, 'C');$pdf->SetXY( 100, 158 ); $pdf->SetFont('Arial','B',10); $pdf->Cell( 60, 10,$data['ville'], 0, 1, 'C');
            $pdf->Line(20, 175, 190, 175);
            $pdf->SetFont( "Arial", "B", 8 ); $pdf->SetXY( 23, 180 ) ; $pdf->MultiCell(190, 4,utf8_decode("Le bénéficiaire reconnaît avoir reçu au titre des versements ouvrant droit à réduction d'impôts,\nla somme de :") , 0, "L");
            
            $pdf->Line(20, 200, 20, 175);  $pdf->Line(190, 200, 190, 175);
            $pdf->SetXY( 95, 185 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 80, 10, "*** ".$data['montant']." Euros *** " .$data['mtt'] , 0, 1, 'C');
            $pdf->Line(20, 200, 190, 200);
            $newDate = date("d-m-Y", strtotime($data['date_paiement']));
            $newDate2 = date("d-m-Y", strtotime($data['date']));
            if ($data['debut_paiement']!="" && $data['fin_paiement']!=""){
                $y = 210;                 
                $pdf->SetXY(22, $y ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 60, 10, utf8_decode("Date de paiement :  ".$data['debut_paiement']." au ".$data['fin_paiement'])  ,0, 0, 'C');
            }
            if($data['date_paiement']!=""){
                $y=210;
                $pdf->SetXY( 10, $y ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 80, 10, "Date de paiement :  ".$newDate , 0, 0, 'C');
            }
            $pdf->SetXY( 90, 210 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 80, 10, "Date et Signature :  ".$newDate2 , 0, 0, 'C');
            $pdf->SetXY( 10, $y+20 ); $pdf->SetFont('Arial','B',8); $pdf->Cell( 80, 10, "Mode de versement :  ".$data['mop'] , 0, 0, 'C');
            
            
        }
        mysqli_free_result($result);
        $requete="UPDATE don
                SET pdf = '".$nom_file."' WHERE id_don = ".$id.";";
        $result = mysqli_query($mysqli, $requete)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
        // **************************
        // pied de page
        // **************************
        // par page de 18 lignes
        $num_page++; $limit_inf += 18; $limit_sup += 18; 
    }
    $path1 = "pdf/".date('Y') ;
    $path = "pdf/".date('Y')."/".date('m') ;
    if (!is_dir($path1)) {
        mkdir($path1, 0777, true);
    }
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
    $filename= "pdf/".date('Y')."/".date('m')."/".$nom_file;
    $pdf->Output( $filename, 'F');
    $pdf->Output( $filename, 'I');
    
    
    ?>	