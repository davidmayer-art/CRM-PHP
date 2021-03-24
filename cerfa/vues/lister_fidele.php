

<br><br>

<div class="container">

    <?php

    $fideles=getFifi()
    ?>
    
    <div class="row">
        <div class="col-3">
            <!-- <input class="form-control mb-4" id="tableSearch" type="text"  placeholder="Rechercher" > -->
        </div>
        <div class="col-2">
        </div>
        <div class="col-4">
            <a href="ajouter.php"><button type="button" class="btn btn-success"> Ajouter donnateur </button></a>
        </div>
        <div class="col-3">
            <a href="csv.php"><button type="button" class="btn btn-success">Export Excel</button></a>
        </div>
    </div>
    <br>
    <table class="table table-bordered table-striped display" id="tab" >
      <caption>
            
        </caption>
        <thead>
            <tr>
            <th> Modifier </th>
            <th> Nom </th>
            <th> Prénom </th>
            <th> Nom Societe </th>
            <th> Adresse </th>
            <th> Mail </th>
            </tr>
        </thead>
        <tbody  id="myTable">  
            <?php
             $fidele=getFifi();
                foreach($fidele as $test) :
            ?>     
                <tr>
                    <td> <a href="<?= 'modifier.php?id_fidele='.rawurlencode($test['id_fidele']).'&civilite='.rawurlencode($test['civilite']).'&nom='.rawurlencode($test['nom']).'&prenom='.rawurlencode($test['prenom']).'&adresse='.rawurlencode($test['adresse']).'&cp='.rawurlencode($test['cp']).'&ville='.rawurlencode($test['ville']).'&pays='.rawurlencode($test['pays']).'&mail='.rawurlencode($test['mail']).'&port='.rawurlencode($test['port']).'&nom_societe='.rawurlencode($test['nom_societe']);?>"> Modifier </td>
                    <td> <a href="<?= 'ajouter_v2.php?id_fidele='.rawurlencode($test['id_fidele']).'&civilite='.rawurlencode($test['civilite']).'&nom='.rawurlencode($test['nom']).'&prenom='.rawurlencode($test['prenom']).'&adresse='.rawurlencode($test['adresse']).'&cp='.rawurlencode($test['cp']).'&ville='.rawurlencode($test['ville']).'&pays='.rawurlencode($test['pays']).'&mail='.rawurlencode($test['mail']).'&port='.rawurlencode($test['port']).'&nom_societe='.rawurlencode($test['nom_societe']);?>"> 
                    <?php echo utf8_encode( $test["civilite"])?> <?php echo $test["nom"]?> </a> </td>
                    <td><?php echo $test["prenom"]?></td>
                    <td><?php echo $test["nom_societe"]?></td>
                    <td align="center"><?php echo $test["adresse"]?><br><?php echo $test["cp"]?>   <?php echo $test["ville"]?><br><?php echo $test["pays"]?></td> 
                    <td><?php echo $test["mail"]?></td>
                </tr>
            <?php
                  endforeach;
            ?>       
       </tbody>       
     </table>    
</div>

<br><br><br><br><br>
<script type="text/javascript">
   $(document).ready(function(){
        $("#tableSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        }); 
    });
    $('#tab').DataTable({
      language: {
            url: "assets/DataTables/media/French.json"
        },
        "ordering": false,
        "info":     false
    });
</script>