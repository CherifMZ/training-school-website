<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerRestauration.php');

session_start();
if (!isset($_SESSION['idtype'])=='6') {
    header('Location: ../index.php');
  }

class restaurationView {
    public function head() {
        ?>
        <head>
            <title>Restauration</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/restauration.css">
        </head>
        <?php
    }

    public function navBar() {
        ?>
        <ul class="topnav">
            <li class="left"><img src="../images/logos/laurel.png"></li>
            <li class="middle"><a href="#home">El Amal Academy</a></li>
            <li class="right"><a href="#twitter">Twitter</a></li>
            <li class="right"><a href="#instagram">Instagram</a></li>
            <li class="right"><a href="#facebook">Facebook</a></li>
            <li class="right"><a href="#linkedin">Linkedin</a></li>
        </ul>
        <br><br>
        <?php
    }

    public function menu() {
        ?>
        <div class="menuHorizontal">
            <ul>
                <li><a class="horizontal" href="#home">Page d'Accueil</a></li>
                <li><a  class="optional" href="../controllers/ControllerPresentation.php">Présentation de l'école</a></li>
                <li><a class="optional" href="../controllers/ControllerCyclePrimaire.php">Cycle Primaire</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleMoyen.php">Cycle Moyen</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleSec.php">Cycle Secondaire</a></li>
                <li><a class="optional" href="../controllers/ControllerEspaceEns.php">Espace Enseignant</a></li>
                <li><a href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a href="../controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a  class="optional" href="../controllers/contactController.php">Contact</a></li>
            </ul>
        </div>
        <br>
        <?php
    }
    public function contenu() {
        ?>
        <center><h2>Gestion de la restauration</h2></center>
        <br>

        <h4>Ajout Plat</h4>
        <br>
        <div class="contenaireResto">
                <form method="post">
                <div class="ligne">
                    <div class="nom">
                        <label for="plat">Plat du jour</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="plat" name="plat" placeholder="Entrer un plat" required>
                    </div>
                </div>
                <div class="ligne">
                    <div class="nom">
                        <label for="dessert">Dessert</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="dessert" name="dessert" placeholder="Entrer un dessert" required>
                    </div>
                </div>
                <div class="ligne">
                    <div class="nom">
                        <label for="date">Date</label>
                    </div>
                    <div class="entree">
                        <input type="date" id="date" name="date">
                    </div>
                </div>
                <br>
                <div class="ligne">
                    <input id="submit" type="submit" value="Ajouter" name="submit">
                </div>
                </form>
            </div>
        <?php
        //require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerRestauration.php');
        $controler = new ControllerRestauration();
        $controler->ajoutMenu();
        ?>
        </div>
        <br>

        <h4>Supprimer Plat</h4>
        <br>

        <div class="contenaireResto">
                <form method="post">
                <div class="ligne">
                    <div class="nom">
                        <label for="idN">ID</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="idN" name="idN" placeholder="Entrer un ID" required>
                    </div>
                </div>
                <br>
                <div class="ligne">
                    <input id="submit2" type="submit" value="Supprimer" name="submit2">
                </div>
                </form>
            </div>
        <?php
        //require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerRestauration.php');
            $controler = new ControllerRestauration();
            $controler->supp();
        ?>
        </div>
        <br>
        <?php

    }

    public function footer() {
        ?>
        
        <footer class=footer">
            <ul>
                <li><a href="#home">Page d'Accueil</a></li>
                <li><a href="../controllers/ControllerPresentation.php">Présentation de l'école</a></li>
                <li><a class="optional" href="../controllers/ControllerCyclePrimaire.php">Cycle Primaire</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleMoyen.php">Cycle Moyen</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleSec.php">Cycle Secondaire</a></li>
                <li><a class="optional" href="../controllers/ControllerEspaceEns.php">Espace Enseignant</a></li>
                <li><a href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a href="../controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a href="../controllers/contactController.php">Contact</a></li>
            </ul>
        </footer>
        <?php
    }

    public function restoBody() {
        ?>
        <body>
        <?php
        $this->navBar();
        $this->menu();
        $this->contenu();
        $this->footer();
        echo '</body>';
    }

    public function afficherRestaurationPage() {
        echo '<html>';
        $this->head();
        $this->restoBody();
        echo '</html>';
    }

}