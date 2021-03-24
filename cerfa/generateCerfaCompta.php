<?php 
error_reporting(E_ALL); 
ini_set("display_errors", 1);
header("Content-type: text/html; charset=ISO-8859-1");
require('fpdf/fpdf.php'); 

//require('fpdf/ChiffresEnLettres.php');


    // le mettre au debut car plante si on declare $mysqli avant !
    $pdf = new FPDF( 'P', 'mm', 'A4' ,true,'UTF-8', false);

    // on declare $mysqli apres !
    $mysqli = new mysqli('localhost', 'root', '', 'test_form2');
    // cnx a la base
    mysqli_select_db($mysqli, 'test_form2') or die('Erreur de connection � la BDD : ' .mysqli_connect_error());

    
  
    // on sup les 2 cm en bas
    $pdf->SetAutoPagebreak(false);
    $pdf->SetMargins(0,0,0);
    $num_page = 1; $limit_inf = 0; $limit_sup = 6;
    // nb de page pour le multi-page : 18 lignes
    $sql = 'select count(*) FROM don where date BETWEEN "'.date('Y').'-01-01" and "'.date('Y').'-12-31"';
    $result = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
    $row_client = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $nb_page = $row_client[0];
    $sql = 'select abs(FLOOR(-' . $nb_page . '/6))';
    $result = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
    $row_client = mysqli_fetch_row($result);
    mysqli_free_result($result);
    $nb_page = $row_client[0];


    
    While ($num_page <= $nb_page)
    {
        $pdf->AddPage();
        // logo : 80 de largeur et 55 de hauteur
        $pdf->Image('assets/img/images.jpg', 80 , 7, 40 ,20);
        $pdf->Image('assets/img/bh.png', 200 , 2, 5 ,5);
        
        $nom_file = utf8_decode("Récapitulatif_de_l'année ".date('Y').".pdf");
        
        // //echo count($row);
        
        // // ***********************
        // // le cadre des articles
        // // ***********************
        $pdf->SetXY( 90, 30 ); $pdf->SetFont('Arial','',10); $pdf->Cell( 20, 10, utf8_decode("Récapitulatif de l'année ".date('Y')), 0, 1, 'C');
       
        
        // les articles
        $pdf->SetFont('Arial','',8);
        $y = 30;
        $x= 20;
        // 1ere page = LIMIT 0,18 ;  2eme page = LIMIT 18,36 etc...
        $sql = 'select id_don, civilite, nom, prenom, adresse, cp, ville, date, montant, debut_paiement, fin_paiement  FROM don where date BETWEEN "'.date('Y').'-01-01" and "'.date('Y').'-12-31"';
        $sql .= ' LIMIT ' . $limit_inf . ',' . $limit_sup;
        $res = mysqli_query($mysqli, $sql)  or die ('Erreur SQL : ' .$sql .mysqli_connect_error() );
        // echo $sql;
        while ($data =  mysqli_fetch_assoc($res))
        {   
            $newDate = date("d-m-Y", strtotime($data['date']));
            $pdf->Line(20, $y+14, 190, $y+14);
            $pdf->Line(20, $x+24, 20, $x+55);  $pdf->Line(190, $x+24, 190, $x+55);
            $pdf->Line(20, $y+45, 190, $y+45);
            // libelle
            $pdf->SetXY( 20, $y+17 ); $pdf->Cell( 140, 5, utf8_decode("N° d'ordre de reçu :") , 0, 0, 'L');$pdf->SetXY( 45, $y+17 ); $pdf->Cell( 10, 5, $data['id_don'], 0, 0, 'L');
            $pdf->SetXY( 65, $y+17 ); $pdf->Cell( 140, 5, "Nom :" , 0, 0, 'L');$pdf->SetXY( 75, $y+17 ); $pdf->Cell( 140, 5, $data['nom'], 0, 0, 'L');
            // // qte
            $pdf->SetXY( 110, $y+17 ); $pdf->Cell( 13, 5,"Prenom :", 0, 0, 'L');$pdf->SetXY( 125, $y+17 ); $pdf->Cell( 13, 5, $data['prenom'], 0, 0, 'L');
            $pdf->SetXY( 20, $y+25 ); $pdf->Cell( 13, 5,"Adresse :", 0, 0, 'L');$pdf->SetXY( 35, $y+25 ); $pdf->Cell( 13, 5, $data['adresse'], 0, 0, 'L');
            $pdf->SetXY( 100, $y+25 ); $pdf->Cell( 13, 5,"Code postal :", 0, 0, 'L');$pdf->SetXY( 120, $y+25 ); $pdf->Cell( 13, 5, $data['cp'], 0, 0, 'L');
            $pdf->SetXY( 140, $y+25 ); $pdf->Cell( 13, 5,"Ville :", 0, 0, 'L');$pdf->SetXY( 150, $y+25 ); $pdf->Cell( 13, 5, $data['ville'], 0, 0, 'L');
            $pdf->SetXY( 20, $y+33 ); $pdf->Cell( 13, 5,"Date du cerfa :", 0, 0, 'L');$pdf->SetXY( 40, $y+33 ); $pdf->Cell( 13, 5, $newDate, 0, 0, 'L');
            $pdf->SetXY( 80, $y+33 ); $pdf->Cell( 13, 5,"Montant :", 0, 0, 'L');$pdf->SetXY( 95, $y+33 ); $pdf->Cell( 13, 5, $data['montant']." Euros", 0, 0, 'L');
            if ($data['debut_paiement'] != "" && $data['fin_paiement'] != "" ){
                $pdf->SetXY( 120, $y+33 ); $pdf->Cell( 13, 5,utf8_decode("Paiement de :"), 0, 0, 'L');$pdf->SetXY( 140, $y+33 ); $pdf->Cell( 13, 5, utf8_decode($data['debut_paiement']." à ".$data['fin_paiement']), 0, 0, 'L');
            }
            
            // $pdf->Line(5, $y+14, 205, $y+14);
            $x += 40;
            $y += 40;
        }
        mysqli_free_result($res);
        
        $pdf->Line(20, 280, 190, 280);
        $pdf->SetXY( 120, 285 ); $pdf->SetFont( "Arial", "B", 12 ); $pdf->Cell( 160, 8, $num_page . '/' . $nb_page, 0, 0, 'C');
        
        
        
        // par page de 18 lignes
        $limit_inf += 6; $limit_sup += 6; $num_page++;
    }
    
    $filename= "pdf/".date('Y')."/".$nom_file;
    $pdf->Output( $filename, 'F');
    $pdf->Output( $filename, 'I');
?>