
<br>

<div class="container">
    <table class="table table-bordered table-striped table-condensed">

        <thead>
            <tr>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Adresse </th>
            </tr>
        </thead>
        <tbody>  
            <?php
             
                foreach($fideles as $test) :
            ?>     
                <tr class = "info">
                    <td> <a href="<?= 'ajouter_v2.php?id_fidele='.rawurlencode($test['id_fidele']).'&civilite='.rawurlencode($test['civilite']).'&nom='.rawurlencode($test['nom']).'&prenom='.rawurlencode($test['prenom']).'&adresse='.rawurlencode($test['adresse']).'&cp='.rawurlencode($test['cp']).'&ville='.rawurlencode($test['ville']).'&pays='.rawurlencode($test['pays']).'&mail='.rawurlencode($test['mail']).'&port='.rawurlencode($test['port']);?>"> 
                    <?php echo $test["civilite"]?> <?php echo $test["nom"]?> </a></td>
                    <td><?php echo $test["prenom"]?></td>
                    <td align="center"><?php echo $test["adresse"]?><br><?php echo $test["cp"]?>   <?php echo $test["ville"]?><br><?php echo $test["pays"]?></td> 
                    <td><?php echo $test["mail"]?></td>
                </tr>
            <?php
                  endforeach;
            ?>       
       </tbody>       
     </table>    
</div>


