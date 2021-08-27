<?php
session_start(); 

if (!isset($_SESSION['idtype'])) {
    header('Location: ../index.php');
} 

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerInfoEleve.php');

class infoEleveView {
    public function head() {
        ?>  
        <head>
            <meta charset="UTF-8">
            <title>Formations</title>
            <link rel="stylesheet" href="../css/infoEleve.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
                <li><a class="horizontal" href="../index.php">Page d'Accueil</a></li>
                <li><a  class="optional" href="../controllers/ControllerPresentation.php">Présentation de l'école</a></li>
                <li><a class="optional" href="../controllers/ControllerCyclePrimaire.php">Cycle Primaire</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleMoyen.php">Cycle Moyen</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleSec.php">Cycle Secondaire</a></li>
                <li><a class="optional" href="../controllers/ControllerEspaceEns.php">Espace Enseignant</a></li>
                <li><a href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a href="../controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a  class="optional" href="controllers/contactController.php">Contact</a></li>
            </ul>
        </div>  
    <br><br>

        <?php
    }

    public function personalInfo() {
        ?>
        <h1><center> Informations personnelles </center></h1>
        <center><img src="../images/info/personal.png" style ="width: 150px; height: 150px;"> </center>
        <br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Date de Naissance</th>
                    <th scope="col">Année</th>
                    <th scope="col">Classe</th>
                </tr>
            </thead>
            <tbody>
    
        <?php
            $controller = new ControllerInfoEleve();
            $query = $controller->getInfo();

            while($row=$query->fetch()) {
                echo 
                "<tr>" .
                "<td>" . $row["id"] . "</td>" .
                "<td>" . $row["nom"] . "</td>" .
                "<td>" . $row["prenom"] . "</td>" .
                "<td>" . $row["dateNaissance"] . "</td>" .
                "<td>" . $row["annee"] . "</td>" .
                "<td>" . $row["nomc"] . "</td>" .
                "</tr>";
        }
        echo "</tbody>";
        ?>
        </table>
        <br><br>

    <?php
    }
    public function activities() {
        ?>

        <h1><center> Activités extrascolaires </center></h1>
        <center><img src="../images/info/sport.png" style ="width: 150px; height: 150px;"> </center>
        <br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Numéro</th>
                    <th scope="col">Activité</th>
                </tr>
            </thead>
            <tbody>
    
        <?php
            $controller = new ControllerInfoEleve();
            $query = $controller->getExtraScolaire();

        while($row=$query->fetch()) {
            echo 
            "<tr>" .
            "<td>" . $row["id"] . "</td>" .
            "<td>" . $row["nom"] . "</td>" .
            "</tr>";
        }
        echo "</tbody>";
        ?>

    </table>
<br><br>

<?php
    }
    public function note() {
        ?>

        <h1><center> Notes </center></h1>
        <center><img src="../images/info/grades.png" style ="width: 150px; height: 150px;"> </center>
        <br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nom du module</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody>
            
        <?php
    
            $controller = new ControllerInfoEleve();
            $query = $controller->getNote();

            while($row=$query->fetch()) {
                echo 
                "<tr>" .
                "<td>" . $row["nom"] . "</td>" .
                "<td>" . $row["valeur"] . "</td>" .
                "</tr>";
            }
        echo "</tbody>";
        ?>

    </table>
<br><br>

<?php
    }
    public function edt() {
        ?>
        <h1><center> Emploi du temps</center></h1>
        <center><img src="../images/info/edt.png" style ="width: 150px; height: 150px;"> </center>
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

            $controller = new ControllerInfoEleve();
            $query = $controller->getJour();

            while($row=$query->fetch()) {

                $heure1 = $controller->getNom($row["heure1"]);
                $heure2 = $controller->getNom($row["heure2"]);
                $heure3 = $controller->getNom($row["heure3"]);
                
                echo 
                "<tr>" .
                "<td>" . $row["jour"] . "</td>" .
                "<td>" . $heure1 . "</td>" .
                "<td>" . $heure2 . "</td>" .
                "<td>" . $heure3 . "</td>" .
                "</tr>";
            }
            echo "</tbody>";
    ?>

</table>
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
                <li><a href="../controllers/contactController.php">Contact</a></li>
                <li><a href="../logout.php">Déconnexion</a></li>
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
        $this->personalInfo();
        $this->activities();
        $this->note();
        $this->edt();
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