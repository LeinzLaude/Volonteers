
<form class="form-horizontal"  method="post" action="index.php?page=creation_projet&action=creation?projet">
    <fieldset>

        <!-- Form Name -->
        <legend>Formulaire de création d'un projet</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="nom_projet">Nom du projet</label>  
            <div class="col-md-4">
                <input id="nom_projet" name="nom_projet" type="text" placeholder="" class="form-control input-md" required="">

            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="id_secteur">Type de projet</label>
            <div class="col-md-4">
                <select id="id_secteur" name="id_secteur" class="form-control">

                    <?php
                    $reponse = $bdd->query('SELECT * FROM secteur');
                    while ($donnees = $reponse->fetch()) {
                        ?>
                        <option value=" <?php echo $donnees['id_secteur']; ?>"> <?php echo $donnees['nom_secteur']; ?></option>
                        <?php
                    }
                    $reponse->closeCursor();
                    ?>

                </select>
            </div>
        </div>

        <!-- Textarea -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="description_projet">Description du projet</label>
            <div class="col-md-4">                     
                <textarea class="form-control" id="description_projet" name="description_projet">Dites nous en plus sur votre projet...</textarea>
            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="date_debut_projet">Date de début </label>  
            <div class="col-md-4">
                <input id="date_debut_projet" name="date_debut_projet" type="date" placeholder="" class="form-control input-md">

            </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="date_fin_projet">Date de fin</label>  
            <div class="col-md-4">
                <input id="date_fin_projet" name="date_fin_projet" type="date" placeholder="" class="form-control input-md">

            </div>
        </div>


        <!-- Button -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="valider"></label>
            <div class="col-md-4">
                <button id="valider" name="valider" class="btn btn-primary">Valider</button>
            </div>
        </div>

    </fieldset>
</form>


