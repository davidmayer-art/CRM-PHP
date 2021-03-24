<div id="wrap">
    <div class="container">
        <div class="row">
            <form class="form-horizontal" action="import_csv.php" method="post" name="upload_excel" enctype="multipart/form-data">
                <fieldset>
                    <!-- Form Name -->
                    <legend>Import donnateur</legend>
                    <!-- File Button -->
                    <div class="form-group">
                    <p>Sélectionner un fichier au format CSV. Il faut supprimer la ligne contenant les titres.</p>
                        <label class="col-md-4 control-label" for="filebutton">Selectionner le fichier <br> </label>
                        <div class="col-md-4">
                            <input type="file" name="file" id="file" class="input-large">
                        </div>
                    </div>
                    <!-- Button -->
                    <div class="form-group">
                        <div class="col-md-4">
                            <button type="submit" id="submit" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Importer</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br><br>