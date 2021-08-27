<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerParametre.php');

session_start();
if (!isset($_SESSION['idtype'])=='6') {
    header('Location: ../index.php');
  }

class parametreView {
    public function head() {
        ?>
        <head>
            <title>Gestion des Paramètres</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/gestArticle.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src ="https://code.jquery.com/jquery-3.5.1.js"></script>
        </head>
        <?php
    }

    public function navBar() {
        ?>
    <!-- Navigation Bar -->
        <ul class="topnav">
            <li class="left"><img src="../images/logos/laurel.png"></li>
            <li class="middle"><a href="../index.php">El Amal Academy</a></li>
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
                <li><a class="horizontal" href="../index.php">Page d'Accueil</a></li>
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
        <h2>Gestion des images de diaporama</h2>
        <br>
        <h4>Liste des chemins des images</h4>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $control = new ControllerParametre();
            $qtf = $control->getSrc();

            foreach ($qtf as $row) {
         
                echo 
                    "<tr>" .
                    "<td>" . $row["id"] . "</td>" .
                    "<td>" . $row["source"] . "</td>" .
                    "</tr>";
            }
                echo "</tbody>";

        ?>
        </table> 
        <br>
        <h4>Ajouter une image au diaporma</h4>
        <br>
        <form method="post">
            <div class="article">
                <label for="pic"><b>Image</b></label>
                <input type="text" id="pic" placeholder="Entrer un chemin vers une image" name="pic" required>
                <input id="unsub" type="submit" value="Ajouter" name="submit">
            </div>
        </form>

        <?php
            $controler = new ControllerParametre();
            $controler->ajouter();
        ?>

    <br>

    <h4>Supprimer une image au diaporma</h4>
        <br>
        <form method="post">
            <div class="article">
                <label for="pic2"><b>Image</b></label>
                <input type="text" id="pic2" placeholder="Entrer l'ID de l'image" name="pic2" required>

                <input id="unsub2" type="submit" value="Supprimer" name="submit2">
            </div>
        </form>

        <?php
            $controler = new ControllerParametre();
            $controler->supp();
        ?>

        <br>

        <h4>Modifier la source d'une image</h4>
            <br>
            <form method="post">
                <div class="article">
                    <label for="pic3"><b>Image</b></label>
                    <input type="text" id="pic3" placeholder="Entrer l'ID de l'image" name="pic3" required>
                    <input type="text" id="pic4" placeholder="Entrer le chemin de l'image" name="pic4" required>
                    <input id="unsub3" type="submit" value="Modifier" name="submit3">
                </div>
            </form>

            <?php
                $controler = new ControllerParametre();
                $controler->modifier();
            ?>

        <?php
    }

    public function footer() {
        ?>
        <!-- Footer -->
        <footer class=footer">
            <ul>
                <li><a href="../index.php">Page d'Accueil</a></li>
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

    public function articleBody() {
        ?>
        <body>
        <?php
        $this->navBar();
        $this->menu();
        $this->contenu();
        $this->footer();
        echo '</body>';
    }

    public function afficherPage() {
        echo '<html>';
        $this->head();
        $this->articleBody();
        echo '</html>';
    }

}
