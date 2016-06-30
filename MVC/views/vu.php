
<h1><font face="arial" color="PURPLE"><b><p align="center" >Veuillez vous connecter : </p></b></font></h1>


<form action="<?php echo $this->url(array('action'=>'index')); ?>" method="post">

<table >
    <tr>
        <td>
            Log in
         </td>
      <td>
          <input type="text" name="mail_user" required="required">
      </td>     
    </tr>
     <tr>
         <td>
            Mot de passe
         </td>
      <td>
          <input type="password" name="mdp_user" required="required">
      </td>     
    </tr>
     <tr>
         <td colspan="2">
          <input type="submit" value = "Valider" name="valider">
          <input type="reset"  value="Annuler"   name="Annuler">
      </td> 

    </tr>
</table>
    
    
</form>
<p align="center"> <?php echo $this->message;?></p>


