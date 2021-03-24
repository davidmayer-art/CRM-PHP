
<!--Vue pour la saisie des informations dans un formulaire!-->
<div class="container">
<h1>Créer votre compte</h1>
<meta charset="utf-8">
<form name="formAjout" action="" method="post" class="addForm">
  <fieldset>
    <legend>Entrer les donnees necessaires a la creation du compte </legend>
    <div class="row">
      <div class="col-7">
        <p><?php /* <label>Nom : </label> */ ?> <input type="text" placeholder="Nom"name="name" size="10" class="form-control" required/></p>
      </div>
      <div class="col-7">
        <p><?php /*  <label>Mot de passe :</label> */ ?> <input type="password" placeholder="Mot de passe" name="pass" size="20" class="form-control" required/></p>
      </div>
      <div class="col-7">
        <p><?php /*  <label>Repeter mot de passe :</label> */ ?><input type="password" placeholder="Repeter votre mot de passe" name="pass_t" size="20" class="form-control" required/></p>
      </div>
    </div>
  </fieldset>
  <button type="submit" class="btn btn-primary ">Enregistrer</button>
  <button type="reset" class="btn btn-secondary">Annuler</button>
</form>
</div>