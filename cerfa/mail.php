<?php

    require("./include/_init.inc.php");
    $bdd = getBDD();
    $don=getDon();
    
    $pdf=html($_GET['pdf']);
    $mail=html($_GET['mail']);
    $montant=html($_GET['montant']);
    
    $filename= "pdf/".date('Y')."/".date('m')."/".$pdf;
    
// Recipient 
$to = $mail; 
 
// Sender 
 
$fromName = 'TEST'; 
 
// Email subject 
$subject = 'Recu Crefa';  
 
// Attachment file 
$file = $filename; 
 
// Email body content 
$htmlContent = ' 
    <p>Bonjour,<br>J\'ai le plaisir de vous adresser le recu correspondant à votre don de '.$montant.' €.</p>';  
 
// Header for sender info 
$headers = "From: $fromName"; 
 
// Boundary  
$semi_rand = md5(time());  
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";  
 
// Headers for attachment  
$headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\""; 
 
// Multipart boundary  
$message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" . 
"Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";  
 
// Preparing attachment 
if(!empty($file) > 0){ 
    if(is_file($file)){ 
        $message .= "--{$mime_boundary}\n"; 
        $fp =    @fopen($file,"rb"); 
        $data =  @fread($fp,filesize($file)); 
 
        @fclose($fp); 
        $data = chunk_split(base64_encode($data)); 
        $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
        "Content-Description: ".basename($file)."\n" . 
        "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
        "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
    } 
} 
$message .= "--{$mime_boundary}--"; 
$returnpath = "-f" . $fromName; 
 
// Send email 
$mail = @mail($to, $subject, $message, $headers, $returnpath);  
 
// Email sending status 

    if($mail){
        header("Location:lister.php");
    }else{
        echo 'Email sending failed.';
    }

?>