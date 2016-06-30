
            <?php
            if (isset($_SESSION['id_user'])) {
                ?>
<nav class="navbar-fixed-top" role="naviation" style="background-color:#2C3E50;">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="User.php?id=accueil"><span style=";margin-left:45%;"><font face="Forte" color="white" style="font-size:33px;text-shadow: 0 0 7px rgba(0,0,0, 0.5);">Volonteers</font></span></a>

                <ul class="user-menu">
                    <li><a href="index.php?page=deconnexion&action=logout"><font color="white"><span class="glyphicon glyphicon-off"></font></span></a></li>

                </ul>          
        </div>
    </div>
</nav>
                <?php
            } else {
                ?>


<nav class="navbar-fixed-top" role="naviation" style="background-color: black;">
    <div class="container-fluid">
        <div class="navbar-header">
                <ul class="user-menu">
                    <li class="dropdown pull-right">
                        <span style="padding-right: 4px"><a href="index.php?page=connexion"><font color="grey" face="arial" size="3" style="">Connexion</font></a></span>
                        <span><a href="index.php?page=inscription"><font color="grey" face="arial" size="3" style="">Inscription</font></a></span>
                    </li>
                </ul>
        </div>
    </div>
</nav>

  <?php } ?>