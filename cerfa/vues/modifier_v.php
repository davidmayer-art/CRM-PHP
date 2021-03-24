<br>
<?php $fideles=getFifi() ?>
<?php $mensualites=getMensualite() ?>
<form action="" method="post" class="addForm" id="form" name="formAjout">
    <fieldset >
        <div class="container">
            <div class="row">
                <div class="col-1">
					<label > Civilité :</label>
					<input id="civilite" name="civilite" class="form-control" value="<?php echo $civilite ?>" required></input>
                </div>
                <div class="col-3">
                    <label >Nom :</label><input id="nom" name="nom" type="text" class="form-control" pattern="[A-Za-z '-]+$" value="<?php echo $nom ?>" id="nom" onkeyup="this.value=this.value.toUpperCase()" > 
                </div>
                <div class="col-4">
                    <label >Prénom :</label><input name="prenom" value="<?php echo $prenom ?>" pattern="[A-Za-zé. '-]+$" type="text" class="form-control" id="prenom" >
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label >Nom Societe :</label><input id="nom_societe" name="nom_societe" type="text" class="form-control" pattern="[A-Za-zé. '-]+$" value="<?php echo $nom_societe ?>" id="nom_societe" onkeyup="this.value=this.value.toUpperCase()" > 
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <label> Adresse :</label> <input name="adresse" value="<?php echo $adresse ?>" class="form-control" id="adresse" rows="2" cols="2"  required></input>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label> Code Postal :</label> <input name="cp" value="<?php echo $cp ?>" pattern="[0-9]{5}+$" maxlength=5 type="text" name="cp" class="form-control" required />
                </div>
                <div class="col-4">
                    <label> Ville :</label> <input name="ville" value="<?php echo $ville ?>" type="text" name="ville" class="form-control" required />
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <label> Pays :</label> <input name="pays" value="<?php echo $pays ?>" type="text" pattern="[A-Za-z '-]+$" name="pays" class="form-control" required />
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label> Mail :</label> <input name="mail" type="text" name="mail" value="<?php echo $mail ?>" class="form-control"  />
                </div>
                <div class="col-4">
                    <label> Portable :</label> <input name="port" type="text" id="port" value="<?php echo $port ?>" class="form-control"  />
                </div>
            </div>
            
      
            
        </div>
    </fieldset>
    <br><br>
    <div style="padding-left:200px">
        <input type="submit" name="addDon" value="Modifier"  class="btn btn-primary"/> 
        <button type="button" class="btn btn-secondary" onclick="window.location.replace('lister_F.php')" value="Annuler"> Annuler </button>
    </div>
</form>  
<br>
<br>
<br>



