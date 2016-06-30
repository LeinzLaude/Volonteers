<?php

foreach ($user_projet as $n)
{
    $nom_user=$n['nom_user'];
    $prenom_user=$n['prenom_user'];
    $ville_user=$n['ville_user'];
    $profession_user=$n['profession_user'];
    $prenom_user=$n['prenom_user'];
    $mail_user=$n['mail_user'];
    $id_secteur=$n['id_secteur'];
}


$x=$laPasserelle->get_secteur_projet($id_secteur);
foreach ($x as $n)
{
    $nom_secteur=$n['nom_secteur'];
}

foreach ($projet as $n)
{
    $nom_projet=$n['nom_projet'];
   $description_projet=$n['description_projet'];
     $date_debut_projet=$n['date_debut_projet'];
     $date_fin_projet=$n['date_fin_projet'];
}

?>


<div style="margin-bottom: 40px;">
      <div style="margin-bottom: 30px;font-size: 40px;font-weight: 0;color: #2C3E50;background-color: #E1E9F0;padding-left: 30px;border-radius: 5px; border:1px solid #2C3E50"><img height="40px" src="images/projet.svg"/><?php echo" $nom_projet" ?></div>
      <div style="margin-top:10px;font-weight: 0;color: grey;padding:3px;"><b>Déscription du projet : </b><?php echo" $description_projet" ?></div>
      <div style="margin-top:10px;font-weight: 0;color: grey;padding:3px;"><b>Type de projet : </b><?php echo" $nom_secteur" ?></div>
      <div style="margin-top:10px;font-weight: 0;color: grey;padding:3px;"><b>Date de début du projet : </b><?php echo" $date_debut_projet" ?></div>
      <div style="margin-top:10px;font-weight: 0;color: grey;padding:3px;"><b>Date de fin du projet : </b><?php echo" $date_fin_projet" ?></div>
      <div style="margin-top: 30px;font-size: 20px;font-weight: 0;color: #2C3E50;background-color: white;padding-left: 30px;border-radius: 5px; border:1px solid #2C3E50">Pour participer à ce projet veuillez contacter<b><?php echo" $nom_user" ?> <?php echo" $prenom_user" ?></b> : <img height="30px" src="images/mail.svg"/><?php echo" $mail_user" ?></div>
  </div>  


<?php
/*
	********************************************************************************************
	CONFIGURATION
	********************************************************************************************
*/
// destinataire est votre adresse mail. Pour envoyer à plusieurs à la fois, séparez-les par une virgule
$destinataire = $_SESSION['mail_user'];
 
// copie ? (envoie une copie au visiteur)
$copie = 'oui';
 
// Action du formulaire (si votre page a des paramètres dans l'URL)
// si cette page est index.php?page=contact alors mettez index.php?page=contact
// sinon, laissez vide
$form_action = '';
 
// Messages de confirmation du mail
$message_envoye = "Votre message nous est bien parvenu !";
$message_non_envoye = "L'envoi du mail a échoué, veuillez réessayer SVP.";
 
// Message d'erreur du formulaire
$message_formulaire_invalide = "Vérifiez que tous les champs soient bien remplis et que l'email soit sans erreur.";
 
/*
	********************************************************************************************
	FIN DE LA CONFIGURATION
	********************************************************************************************
*/
 
/*
 * cette fonction sert à nettoyer et enregistrer un texte
 */
function Rec($text)
{
	$text = htmlspecialchars(trim($text), ENT_QUOTES);
	if (1 === get_magic_quotes_gpc())
	{
		$text = stripslashes($text);
	}
 
	$text = nl2br($text);
	return $text;
};
 
/*
 * Cette fonction sert à vérifier la syntaxe d'un email
 */
function IsEmail($email)
{
	$value = preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $email);
	return (($value === 0) || ($value === false)) ? false : true;
}
 
// formulaire envoyé, on récupère tous les champs.
$nom     = (isset($_POST['nom']))     ? Rec($_POST['nom'])     : '';
$email   = (isset($_POST['email']))   ? Rec($_POST['email'])   : '';
$objet   = (isset($_POST['objet']))   ? Rec($_POST['objet'])   : '';
$message = (isset($_POST['message'])) ? Rec($_POST['message']) : '';
 
// On va vérifier les variables et l'email ...
$email = (IsEmail($email)) ? $email : ''; // soit l'email est vide si erroné, soit il vaut l'email entré
$err_formulaire = false; // sert pour remplir le formulaire en cas d'erreur si besoin
 
if (isset($_POST['envoi']))
{
	if (($nom != '') && ($email != '') && ($objet != '') && ($message != ''))
	{
		// les 4 variables sont remplies, on génère puis envoie le mail
		$headers  = 'From:'.$nom.' <'.$email.'>' . "\r\n";
		//$headers .= 'Reply-To: '.$email. "\r\n" ;
		//$headers .= 'X-Mailer:PHP/'.phpversion();
 
		// envoyer une copie au visiteur ?
		if ($copie == 'oui')
		{
			$cible = $destinataire.';'.$email;
		}
		else
		{
			$cible = $destinataire;
		};
 
		// Remplacement de certains caractères spéciaux
		$message = str_replace("&#039;","'",$message);
		$message = str_replace("&#8217;","'",$message);
		$message = str_replace("&quot;",'"',$message);
		$message = str_replace('&lt;br&gt;','',$message);
		$message = str_replace('&lt;br /&gt;','',$message);
		$message = str_replace("&lt;","&lt;",$message);
		$message = str_replace("&gt;","&gt;",$message);
		$message = str_replace("&amp;","&",$message);
 
		// Envoi du mail
		$num_emails = 0;
		$tmp = explode(';', $cible);
		foreach($tmp as $email_destinataire)
		{
			if (mail($email_destinataire, $objet, $message, $headers))
				$num_emails++;
		}
 
		if ((($copie == 'oui') && ($num_emails == 2)) || (($copie == 'non') && ($num_emails == 1)))
		{
			echo '<p>'.$message_envoye.'</p>';
		}
		else
		{
			echo '<p>'.$message_non_envoye.'</p>';
		};
	}
	else
	{
		// une des 3 variables (ou plus) est vide ...
		echo '<p>'.$message_formulaire_invalide.'</p>';
		$err_formulaire = true;
	};
}; // fin du if (!isset($_POST['envoi']))
 
if (($err_formulaire) || (!isset($_POST['envoi'])))
{
	// afficher le formulaire
	echo '
	<form id="contact" method="post" action="'.$form_action.'" style="text-align:center;">
	<fieldset>
		<p><input placeholder="Nom" class="feedback-input" type="text" id="nom" name="nom" value="" tabindex="1" /></p>
		<p><input placeholder="Email" class="feedback-input" type="text" id="email" name="email" value="'.$mail_user.'" tabindex="2" /></p>
	</fieldset>
 
	<fieldset>
		<p><input placeholder="Objet" class="feedback-input" type="text" id="objet" name="objet" value="'.stripslashes($objet).'" tabindex="3" /></p>
		<p><textarea placeholder="Méssage" class="feedback-input" id="message" name="message" tabindex="4" cols="30" rows="8">'.stripslashes($message).'</textarea></p>
	</fieldset>
 
	<div style="text-align:center;"><input class="feedback-input" type="submit" name="envoi" value="Envoyer" /></div>
	</form>';
};
?>



<style>
    @import url(http://fonts.googleapis.com/css?family=Montserrat:400,700);


form { max-width:420px;  }

.feedback-input {
  color:black;
  font-family: Helvetica, Arial, sans-serif;
  font-weight:500;
  font-size: 18px;
  border-radius: 5px;
  line-height: 22px;
  background-color: transparent;
  border:2px solid #2C3E50;
  transition: all 0.3s;
  padding: 13px;
  margin-bottom: 15px;
  width:100%;
  box-sizing: border-box;
  outline:0;
}

.feedback-input:focus { border:2px solid #CC4949; }

textarea {
  height: 150px;
  line-height: 150%;
  resize:vertical;
}

[type="submit"] {

  width: 100%;
  background:#2C3E50;
  border-radius:5px;
  border:0;
  cursor:pointer;
  color:white;
  font-size:24px;
  padding-top:10px;
  padding-bottom:10px;
  transition: all 0.3s;
  margin-top:-4px;
  font-weight:700;
}
[type="submit"]:hover { background:#2C3E50; }
</style>