<?php
$id_user = $_SESSION['id_user'];
$lesprojets=$laPasserelle->get_all_user($id_user);
?>

<div style="min-width:100%;">
    <?php
    foreach ($lesprojets as $n) {
        ?>
        <div style="margin-bottom: 10px;height: 90px;background-color: #293642;box-shadow: 1px 1px 12px #aaa;padding: 5px;border-radius: 5px;">
            <?php
            echo'<table>
            <tr>
            <td style="width:90px">
                        <img height="80px"src="images/user.png"/>
            </td>
            <td>';
            echo'<font style="font-size:20px;color:white;text-align:center;"><b>'.$n['prenom_user'].' '.$n['nom_user'].'</b></font>';
            echo'<br/>';
            echo'<font style="font-size:15px;color:white;text-align:center;">'.$n['profession_user'].'</font>';  
            echo'<br/>';
            echo'<a href="index.php?page=profil_user&action=view?user&iduser='.$n['id_user'].'"><b><font style="font-size:10px;color:white;text-align:center;">Voir le profil</font></b></a>';
           echo'
            </td>
            </tr>
            </table>';
            ?>

        </div>
        <?php
    }
    ?>
</div>