<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=volonteers', 'root', '');
?>

<!doctype html>

<html>
        <header>
            <?php include ('views/v_header.php'); ?>
        </header>
        <nav>
            <?php include ('views/v_menu.php'); ?> 
        </nav>
                    <?php
            if (isset($_SESSION['id_user'])) {
                ?>
        <aside>
            <?php include ('views/v_aside.php'); ?>
        </aside>  
            <?php } ?>
    
            <?php
            if (isset($_SESSION['id_user'])) {
                ?>
    <section>
        
              <?php } else {?>
            <section style="margin-left: 0% !important;margin-right: 0% !important;margin-top: 0% !important;height:0px !important;">
                <?php } ?>
            <?php
            if (!empty($_GET['page']) AND is_file('controllers/' . $_GET['page'] . '.php')) {
                include ('controllers/' . $_GET['page'] . '.php');
            } else 
            {
                include ('controllers/index.php');
            }
            ?>
        </section>
        <footer>
        </footer>

    
</html>
