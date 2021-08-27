<?php
session_start();

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerAffichageEdt.php');

class affichageEdtView {
    public function head() {
        ?>
        <head>
            <title>Emploi du temps</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/restauration.css">
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
                <li><a class="optional" href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a class="optional" href="../controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a class="optional" href="../controllers/contactController.php">Contact</a></li>
            </ul>
        </div>
        <br>
        <?php
    }

    public function contenu() {
        ?>
        <!-- Zone du contenu -->
        <center><h2>Emploi du temps global</h2></center>
        <br>
        
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

        <?php
            $id = $_GET['id'];
            $control = new ControllerAffichageEdt();
            $qtf = $control->getedt($id);

            foreach ($qtf as $row) {

                $heure1 = $control->toS($row["heure1"]);
                $heure2 = $control->toS($row["heure2"]);
                $heure3 = $control->toS($row["heure3"]);
                
                if ( ($row["jour"]=="dimanche") || ($row["jour"]=="Dimanche")) {
                    echo 
                    "<tr>" .
                    "<td><b>" . $row["nomc"] . "</b></td>" .
                    "<td>" .  "</td>" .
                    "<td>" .  "</td>" .
                    "<td>" .  "</td>" .
                    "</tr>";

                    echo 
                    "<tr>" .
                    "<td>" . $row["jour"] . "</td>" .
                    "<td>" . $heure1 . "</td>" .
                    "<td>" . $heure2 . "</td>" .
                    "<td>" . $heure3 . "</td>" .
                    "</tr>";

                } else {
                    echo 
                    "<tr>" .
                    "<td>" . $row["jour"] . "</td>" .
                    "<td>" . $heure1 . "</td>" .
                    "<td>" . $heure2 . "</td>" .
                    "<td>" . $heure3 . "</td>" .
                    "</tr>";
                }
                    
            }
                echo "</tbody>";
                echo "<br>";

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
                <li><a href="#news">Présentation de l'école</a></li>
                <li><a class="optional" href="../controllers/ControllerCyclePrimaire.php">Cycle Primaire</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleMoyen.php">Cycle Moyen</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleSec.php">Cycle Secondaire</a></li>
                <li><a class="optional" href="../controllers/ControllerEspaceEns.php">Espace Enseignant</a></li>
                <li><a href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a href="../controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a href="../controllers/contactController.php">Contact</a></li>
                <li><a class="right" href="../controllers/loginController.php">Connexion</a></li>
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