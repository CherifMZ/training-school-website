<?php

session_start();

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerListeEns.php');

class listeEnsView {
    public function head() {
        ?>
        <head>
            <title>Liste des Enseignants</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/restauration.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <script src ="https://code.jquery.com/jquery-3.5.1.js"></script>
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
                <li><a class="horizontal" href="../index.php">Page d'Accueil</a></li>
                <li><a class="optional" href="#news">Présentation de l'école</a></li>
                <li><a class="optional" href="../controllers/ControllerCyclePrimaire.php">Cycle Primaire</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleMoyen.php">Cycle Moyen</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleSec.php">Cycle Secondaire</a></li>
                <li><a class="optional" href="../controllers/ControllerEspaceEns.php">Espace Enseignant</a></li>
                <li><a href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a href="../controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a class="optional" href="../controllers/contactController.php">Contact</a></li>
            </ul>
        </div>
        <br>
        <?php
    }

    public function contenu() {
        ?>
        <!-- Zone du contenu -->
        <center><h2>Liste des enseignants / Heures de récéption</h2></center>
        <br>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Classe</th>
                    <th scope="col">Heure de récéption</th>
                </tr>
            </thead>
            <tbody>

        <?php
            $id = $_GET['id'];
            $control = new ControllerListeEns();
            $qtf = $control->getListe($id);

            foreach ($qtf as $row) {
         
                echo 
                    "<tr>" .
                    "<td>" . $row["nom"] . "</td>" .
                    "<td>" . $row["prenom"] . "</td>" .
                    "<td>" . $row["nomc"] . "</td>" .
                    "<td>" . $row["hour"] . "</td>" .
                    "</tr>";
            }
                echo "</tbody>";

        ?>
        </table>  
        <br>
        <p><b>NB : seuls les enseignants du cycle qui ont une heure de récéption seront affichés ici.</b></p>
        <?php
    }

    public function footer() {
        ?>
        <!-- Footer -->
        <footer class=footer">
            <ul>
                <li><a href="#home">Page d'Accueil</a></li>
                <li><a href="#news">Présentation de l'école</a></li>
                <li><a class="optional" href="controllers/ControllerCyclePrimaire.php">Cycle Primaire</a></li>
                <li><a class="optional" href="controllers/ControllerCycleMoyen.php">Cycle Moyen</a></li>
                <li><a class="optional" href="controllers/ControllerCycleSec.php">Cycle Secondaire</a></li>
                <li><a class="optional" href="../controllers/ControllerEspaceEns.php">Espace Enseignant</a></li>
                <li><a href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a href="../controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a href="../controllers/contactController.php">Contact</a></li>
                <li><a class="right" href="controllers/loginController.php">Connexion</a></li>
            </ul>
        </footer>
        <?php
    }

    public function aBody() {
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
        $this->aBody();
        echo '</html>';
    }

}