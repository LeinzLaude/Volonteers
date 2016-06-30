
<form class="form-horizontal" method="post" action="index.php?page=inscription">
<fieldset>

<!-- Form Name -->
<legend>Formulaire d'inscription</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="nom_user">Nom</label>  
  <div class="col-md-4">
  <input id="nom_user" name="nom_user" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="prenom_user">Prénom</label>  
  <div class="col-md-4">
  <input id="prenom_user" name="prenom_user" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="date_niassance_user">Date de niassance</label>  
  <div class="col-md-4">
  <input id="date_niassance_user" name="date_naissance_user" type="date" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="profession_user">Profession</label>  
  <div class="col-md-4">
  <input id="profession_user" name="profession_user" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="pays_user">Pays</label>  
  <div class="col-md-4">
  <input id="pays_user" name="pays_user" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ville_user">Ville</label>  
  <div class="col-md-4">
  <input id="ville_user" name="ville_user" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mail_user">Email</label>  
  <div class="col-md-4">
  <input id="mail_user" name="mail_user" type="email" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mdp_user">Mot de passe</label>
  <div class="col-md-4">
    <input id="mdp_user" name="mdp_user" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mdp1_user">Mot de passe</label>
  <div class="col-md-4">
    <input id="mdp1_user" name="mdp1_user" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="valider"></label>
  <div class="col-md-4">
    <button id="valider" name="valider" class="btn btn-primary" data-target="#myModal">Valider</button>
  </div>
</div>

</fieldset>
</form>


 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a large modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

