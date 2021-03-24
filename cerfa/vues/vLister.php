
 
<br><br>


<div class="container">
  
      <div align="center">
        <a href="generateCerfaCompta.php"><button type="button" class="btn btn-info"> Récapitulatif de l'année en cours</button></a>
      </div>
  
  <legend align="center"> </legend>
  <table class="table table-bordered table-striped display" id="tab" >
    <thead>
      <tr>
        <th> N° de cerfa </th>
        <th> Nom </th>
        <th> Prénom </th>
        <th> Nom societe </th>
        <th> Adresse </th>
        <th> Montant </th>
        <th> Télécharger le Cerfa </th>
        <th> Cerfa Duplicata </th>
        <th> Envoi par mail </th>
      </tr>
    </thead>
    <tbody id="myTable">
      <?php foreach($dons as $don) : ?>
        <tr>
          <td> <?php echo $don["id_don"]?></td>
          <td> <?php echo utf8_encode($don["civilite"])?> <?php echo $don["nom"]?></td>
          <td><?php echo $don["prenom"]?></td>
          <td><?php echo $don["nom_societe"]?></td>
          <td align="center"><?php echo $don["adresse"]?><br><?php echo $don["cp"]?>   <?php echo $don["ville"]?><br><?php echo $don["pays"]?></td>
          <td><?php echo $don["montant"]?></td>
          <td> <a href="<?= 'generateCerfa.php?id_don=' . $don['id_don'];?>"> Télécharger </a> </td>
          <td> <a href="<?= 'generateCerfaDuplicata.php?id_don=' . $don['id_don'];?>"> Télécharger </a> </td>
          <?php if($don['mail'] != ""){?>
          <td> <a href="<?= 'mail.php?id_don=' . $don['id_don'].'&pdf='.$don['pdf'].'&id_fidele='.$don['id_fidele'].'&mail='.$don['mail'].'&montant='.$don['montant'];?>"><button type="button" id="button" class="btn btn-primary"> Envoyer </button> </a> </td>
          <?php } else {?>
          <td> <a href="<?= 'mail.php?id_don=' . $don['id_don'].'&pdf='.$don['pdf'].'&id_fidele='.$don['id_fidele'].'&mail='.$don['mail'];?>" disabled><button type="button" id="button" class="btn btn-primary" disabled> Envoyer </button> </a> </td>
          <?php } ?>
        </tr>
      <?php endforeach;?>
    </tbody>
  </table>   
</div>

<br><br><br><br><br><br>

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
