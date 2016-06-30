
<?php
$projet = $laPasserelle->afficher_projet_user($_SESSION['id_user']);
?>

<div style="min-width:100%;">
    <?php
    foreach ($projet as $n) {
        ?>
        <div style="margin-top: 10px;min-height: 100px;background-color: #D1E2E8;box-shadow: 2px 2px 12px #aaa;padding: 5px;border-radius: 5px;">
            <?php
            echo'<div style="background-color:white;min-width:200px;text-align:center;">' . $n['nom_projet'] . '</div><br/>';
            echo$n['description_projet'] . '<br/>';
            ?>
            <a href="index.php?page=suivi_projet&action=supprimer?projet&idprojet=<?php echo $n['id_projet']; ?>"><p align="right">Supprimer</p></a>
        </div>
        <?php
    }
    ?>
</div>