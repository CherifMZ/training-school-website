<?php

session_start();
if (!isset($_SESSION['idtype'])=='6') {
    header('Location: ../index.php');
  }

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerGestionEdt.php');

class gestionEdtView {
    public function head() {
        ?>
        <head>
            <title>Gestion des EDT</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/gestionEdt.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </head>
        <?php
    }

    public function navBar() {
        ?>
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

    public function ajout() {
        ?>
        <h2>Gestion des emplois du temps</h2>
        <br>

        <form method="post" id="my_form">
            <input type="text" id="nomC" name="nomC" placeholder="Entrer le nom de la classe" required>
            <br><br>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Jour</th>
                        <th scope="col">8h-10h</th>
                        <th scope="col">10h-12h</th>
                        <th scope="col">14h-16h</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="jour1" placeholder="Entrer la journée" form="my_form" required/></td>
                        <td><input type="text" name="heure1" placeholder="Entrer un nom de module" form="my_form" required/></td>
                        <td><input type="text" name="heure2" placeholder="Entrer un nom de module" form="my_form" required/></td>
                        <td><input type="text" name="heure3" placeholder="Entrer un nom de module" form="my_form" required/></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="jour2" placeholder="Entrer la journée" form="my_form" /></td>
                        <td><input type="text" name="heure12" placeholder="Entrer un nom de module" form="my_form" /></td>
                        <td><input type="text" name="heure22" placeholder="Entrer un nom de module" form="my_form" /></td>
                        <td><input type="text" name="heure32" placeholder="Entrer un nom de module" form="my_form" /></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="jour3" placeholder="Entrer la journée" form="my_form" /></td>
                        <td><input type="text" name="heure13" placeholder="Entrer un nom de module" form="my_form" /></td>
                        <td><input type="text" name="heure23" placeholder="Entrer un nom de module" form="my_form" /></td>
                        <td><input type="text" name="heure33" placeholder="Entrer un nom de module" form="my_form" /></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="jour4" placeholder="Entrer la journée" form="my_form" /></td>
                        <td><input type="text" name="heure14" placeholder="Entrer un nom de module" form="my_form" /></td>
                        <td><input type="text" name="heure24" placeholder="Entrer un nom de module" form="my_form" /></td>
                        <td><input type="text" name="heure34" placeholder="Entrer un nom de module" form="my_form" /></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="jour5" placeholder="Entrer la journée" form="my_form" /></td>
                        <td><input type="text" name="heure15" placeholder="Entrer un nom de module" form="my_form" /></td>
                        <td><input type="text" name="heure25" placeholder="Entrer un nom de module" form="my_form" /></td>
                        <td><input type="text" name="heure35" placeholder="Entrer un nom de module" form="my_form" /></td>
                    </tr>
                </tbody>
            </table>
            <input id="submit" type="submit" value="Ajouter" name="submit">
        </form>

        <br><br>

        <?php
            $controller = new ControllerGestionEdt();
            $controller->ajout();
        ?>

        <h2>Suppression d'un emplois du temps</h2>
        <br>

<center>
        <form method="post" id="my_form">
            <input type="text" id="nomC2" name="nomC2" placeholder="Entrer le nom de la classe" required>
            <br><br>
            <input id="submit2" type="submit" value="Supprimer" name="submit2">
        </form>
</center>

        <?php
            $controller = new ControllerGestionEdt();
            $controller->supp();
        ?>

        <br><br>
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
                <li><a href="#about">Contact</a></li>
            </ul>
        </footer>
        <?php
    }

    public function Body() {
        ?>
        <body>
        <?php
        $this->navBar();
        $this->menu();
        $this->ajout();
        $this->footer();
        echo '</body>';
    }

    public function afficherPage() {
        echo '<html>';
        $this->head();
        $this->Body();
        echo '</html>';
    }

}