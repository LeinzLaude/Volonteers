
<?php
$projet = afficher_projet();
?>


<?php
foreach ($projet as $n) {
    ?>
<div class="module" style="background-color: white;margin-top: 10px;width:100%;min-height: 100px;box-shadow: 2px 2px 12px #aaa;border-radius: 5px ;">
    <?php
    echo'<h1 class="stripe-1">' . $n['nom_projet'] . '</h1>';
    echo'<p>' . $n['description_projet'] . '</p>';
    ?>
            <a href="index.php?page=information_projet&action=detail?projet&idprojet=<?php echo $n['id_projet']; ?>"><p align="right">En savoir + </p></a>

            </div>
    <?php
}
?>







<style>

    .stripe-1 {
        color: white;
        padding-right:5px;
        padding-left:5px;
        font-size: 23px;
        background: repeating-linear-gradient(
            45deg,
            #606dbc,
            #606dbc 10px,
            #465298 10px,
            #465298 20px
            );
    }
    p{
        padding-right:5px;
        padding-left:5px;
        padding-bottom:5px;
        font-size: 20px;
    }
</style>




