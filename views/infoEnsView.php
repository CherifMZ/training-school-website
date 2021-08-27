<?php
session_start(); 

if (!isset($_SESSION['idtype'])) {
    header('Location: ../index.php');
} 

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerInfoEns.php');

class infoEnsView {
    public function head() {
        ?>  
        <head>
            <meta charset="UTF-8">
            <title>Informations Enseignants</title>
            <link rel="stylesheet" href="../css/gestArticle.css">
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
                <li><a href="../controllers/contactController.php">Contact</a></li>
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
                    <th scope="col">Téléphone</th>
                </tr>
            </thead>
            <tbody>
    
        <?php
            $controller = new ControllerInfoEns();
            $query = $controller->getInfo();

            while($row=$query->fetch()) {
                echo 
                "<tr>" .
                "<td>" . $row["id"] . "</td>" .
                "<td>" . $row["nom"] . "</td>" .
                "<td>" . $row["prenom"] . "</td>" .
                "<td>" . $row["teleph1"] . "</td>" .
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
        <h1><center> Liste des Notes </center></h1>
        <center><img src="../images/info/grades.png" style ="width: 150px; height: 150px;"> </center>
        <br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Note</th>
                </tr>
            </thead>
            <tbody>
    
        <?php
            $controller = new ControllerInfoEns();
            $query = $controller->getNote();

            while($row=$query->fetch()) {
                echo 
                "<tr>" .
                "<td>" . $row["id"] . "</td>" .
                "<td>" . $row["nom"] . "</td>" .
                "<td>" . $row["prenom"] . "</td>" .
                "<td>" . $row["valeur"] . "</td>" .
                "</tr>";
        }
        echo "</tbody>";
        ?>

        </table>
        <br><br>
        <?php
    }

    public function ajout() {
        ?>       
        <h1><center> Ajouter une Note </center></h1>
       <form method="post">
            <div class="article">
                <label for="idN2"><b>ID élève</b></label>
                <input type="text" id="idN2" placeholder="Entrer ID d'une élève" name="idN2" required>

                <label for="note2"><b>Note</b></label>
                <input type="text" id="note2" placeholder="Entrer une note" name="note2" required>

                <label for="rq"><b>Remarque</b></label>
                <input type="text" id="rq" placeholder="Entrer une note" name="rq" required>

                <input id="unsub2" type="submit" value="Ajouter" name="submit2">
            </div>
        </form>
        <?php
            $controler = new ControllerInfoEns();
            $controler->ajout();
        ?>
    <br>
<?php
    }

    public function modif() {
        ?>       
        <h1><center> Modifier une Note </center></h1>
       <form method="post">
            <div class="article">
                <label for="idN"><b>ID élève</b></label>
                <input type="text" id="idN" placeholder="Entrer ID d'une élève" name="idN" required>

                <label for="note"><b>Note</b></label>
                <input type="text" id="note" placeholder="Entrer une note" name="note" required>

                <input id="unsub" type="submit" value="Modifier" name="submit">
            </div>
        </form>
        <?php
            $controler = new ControllerInfoEns();
            $controler->modif();
        ?>
    <br>
    <?php
    }

    public function supp() {
        ?>       
        <h1><center> Supprimer une Note </center></h1>
       <form method="post">
            <div class="article">
                <label for="idN3"><b>ID élève</b></label>
                <input type="text" id="idN3" placeholder="Entrer ID d'une élève" name="idN3" required>

                <label for="note3"><b>Note</b></label>
                <input type="text" id="note3" placeholder="Entrer une note" name="note3" required>

                <input id="unsub3" type="submit" value="Suprrimer" name="submit3">
            </div>
        </form>
        <?php
            $controler = new ControllerInfoEns();
            $controler->supp();
        ?>
    <br>
    <p><b>NB : Rafraichir la page pour voir l'ajout / modification / suppression.</b></p>
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
        $this->note();
        $this->ajout();
        $this->modif();
        $this->supp();
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