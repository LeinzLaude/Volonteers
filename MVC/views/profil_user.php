<?php

foreach ($user as $n)
{
    $nom_user=$n['nom_user'];
    $ville_user=$n['ville_user'];
    $profession_user=$n['profession_user'];
    $prenom_user=$n['prenom_user'];
    $mail_user=$n['mail_user'];
    $pays_user=$n['pays_user'];
}
?>
<table style="padding: 10px;width:100%;">
    <tr style="background-color: white;">
        <td style="width:105px;padding-left: 5px;">
            <img height="89px"src="images/user.png"/>
        </td>
        <td>
            <font size="6px"><?php echo$prenom_user.' '.$nom_user?></font>
            <br/>
            <font><?php echo$profession_user?></font>
            <br/>
            <?php echo$ville_user.', '.$pays_user ?>
            <br/>
            <?php echo$mail_user ?>
            
        </td>
    </tr>
    
</table>

