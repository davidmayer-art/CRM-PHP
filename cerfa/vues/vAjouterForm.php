<br>

<form action="" method="post" class="addForm" id="form" name="formAjout">
    <fieldset >
        <div class="container">
            <div class="row">
                <div class="col-1">
					<label > Civilité :</label>
					<select id="civilite" name="civilite" required>
						<option value="M.">M.</option>
						<option value="Mme.">Mme.</option>
						<option value="Mlle.">Mlle.</option>
						<option value="Ste.">Ste.</option>
					</select>
                </div>
                <div class="col-3">
                    <label >Nom :</label><input id="nom" name="nom" type="text" class="form-control" pattern="[A-Za-z '-é]+$" id="nom" onkeyup="this.value=this.value.toUpperCase()"> 
                </div>
                <div class="col-4">
                    <label >Prénom :</label><input name="prenom"  type="text" class="form-control" pattern="[A-Za-z '-éè]+$" id="prenom" >
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label >Nom Societe :</label><input name="nom_societe"  type="text" class="form-control" pattern="[A-Za-z. '-éè]+$" id="prenom" >
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <label> Adresse :</label> <textarea name="adresse" class="form-control" id="adresse" rows="2" cols="2"  required></textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label> Code Postal :</label> <input name="cp" type="text" name="cp" class="form-control" pattern="[0-9]{5}+$" maxlength=5 required />
                </div>
                <div class="col-4">
                    <label> Ville :</label> <input name="ville" type="text" name="ville" class="form-control" required />
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    <label> Pays :</label> <input name="pays" type="text" name="pays" pattern="[A-Za-z '-]+$" class="form-control" required />
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <label> Mail :</label> <input name="mail" type="text" name="mail" class="form-control"  />
                </div>
                <div class="col-4">
                    <label> Portable :</label> <input name="port" type="text" name="port" class="form-control"  />
                </div>
            </div>
            <!-- <div class="row" >
                <div class="col-8" >
                    <label> Montant :</label> <input name="montant" id="montant" type="text" class="form-control" onBlur="calcule()" required />
                </div>
            </div>
            <div class="row" >
                <div class="col-8" >
                    <label> Montant toute lettre :  <span id="mtt" hidden> </span>  </label> <input type="text" name="mtt" id="mtt2" class="form-control" required>
                </div>
            </div>
            
            <br>

            <label> Moyen de paiement :</label> <br>
            <select id="mop" name="mop" required>
                <option value="Espèce">Espèce</option>
                <option value="Chèque">Chèque</option>
                <option value="Carte Bleu">Carte Bleu</option>
                <option value="Virement">Virement</option>
            </select> -->
        </div>
    </fieldset>
    <br><br>
    <div style="padding-left:200px">
        <input type="submit" name="addDon" value="Ajouter"  class="btn btn-primary"/> 
        <button type="button" class="btn btn-secondary" onclick="window.location.replace('lister_F.php')" value="Annuler"> Annuler </button>
    </div>
</form>  
<br><br><br><br><br><br><br>



