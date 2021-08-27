<?php
    session_start();
    if (!isset($_SESSION['idtype'])=='6') {
        header('Location: ../index.php');
    }
$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerGestionPresentation.php');

class gestionPresentationView {
    public function head() {
        ?>
        <head>
            <title>Gestion de la présentation</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/gestPresentation.css">
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
        <!-- Zone du contenu -->
        <h2>Gestion de la présentation</h2>
        <br>
        <h4>Ajouter une présentation</h4>

        <form method="post">
            <div class="present">

                <label for="photo"><b>Image</b></label>
                <input type="text" id="photo" placeholder="Entrer le lien vers l'image" name="photo">

                <label for="paragraphe"><b>Paragraphe</b></label>
                <input type="text" id="paragraphe" placeholder="Entrer un paragraphe" name="paragraphe" required>
            
                <input id="unsub" type="submit" value="Ajouter" name="submit">
            </div>
        </form>

        <?php
            $controller = new ControllerGestionPresentation();
            $controller->ajouter();
        ?>
<br><br>
<?php
    }
public function contenu2() {
        ?>
        <h4>Modifier une présentation</h4>

        <form method="post">
            <div class="present">

                <label for="idN"><b>ID</b></label>
                <input type="text" id="idN" placeholder="Entrer le lien vers l'image" name="idN" required>

                <label for="photo2"><b>Image</b></label>
                <input type="text" id="photo2" placeholder="Entrer le lien vers l'image" name="photo2">

                <label for="paragraphe2"><b>Paragraphe</b></label>
                <input type="text" id="paragraphe2" placeholder="Entrer un paragraphe" name="paragraphe2">
            
                <input id="unsub2" type="submit" value="Modifier" name="submit2">
            </div>
        </form>

        <?php
            $controller = new ControllerGestionPresentation();
            $controller->modifier();
        ?>
<br><br>

<?php
    }
public function contenu3() {
        ?>
        <h4>Supprimer une présentation</h4>

        <form method="post">
            <div class="present">
                <label for="idN2"><b>ID</b></label>
                <input type="text" id="idN2" placeholder="Entrer le lien vers l'image" name="idN2" required>
                <input id="unsub3" type="submit" value="Supprimer" name="submit3">
            </div>
        </form>

        <?php
            $controller = new ControllerGestionPresentation();
            $controller->supp();
        ?>
<br><br>

<?php
    }
public function contenu4() {
        ?>
        <h4>Liste des présentations</h4>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Chemin vers la photo</th>
                    <th scope="col">Paragraphe</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $controller = new ControllerGestionPresentation();
            $qtf = $controller->getList();

            foreach ($qtf as $row) {
         
                echo 
                    "<tr>" .
                    "<td>" . $row["id"] . "</td>" .
                    "<td>" . $row["photo"] . "</td>" .
                    "<td>" . $row["paragraphe"] . "</td>" .
                    "</tr>";
            }
                echo "</tbody>";

        ?>
        </table>  
        <br>

<?php
    }

    public function footer() {
        ?>

        <!-- Footer -->
        <footer class=footer">
            <ul>
                <li><a href="#home">Page d'Accueil</a></li>
                <li><a href="../controllers/ControllerPresentation.php">Présentation de l'école</a></li>
                <li><a class="optional" href="../controllers/ControllerCyclePrimaire.php">Cycle Primaire</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleMoyen.php">Cycle Moyen</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleSec.php">Cycle Secondaire</a></li>
                <li><a class="optional" href="../controllers/ControllerEspaceEns.php">Espace Enseignant</a></li>
                <li><a href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <<li><a href="../controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a  class="optional" href="../controllers/contactController.php">Contact</a></li>
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
            $this->contenu();
            $this->contenu2();
            $this->contenu3();
            $this->contenu4();
            $this->footer();
            echo '</body>';
    }

    public function afficher() {
        echo '<html>';
        $this->head();
        $this->Body();
        echo '</html>';
    }

}