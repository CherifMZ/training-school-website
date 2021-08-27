<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerUser.php');

session_start();
if (!isset($_SESSION['idtype'])=='6') {
    header('Location: ../index.php');
  }

class userView {
    public function head() {
        ?>
        <head>
            <title>Gestion des Utilisateurs</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/restauration.css">
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
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <img class=img-fluid src=../images/icons/graduated style = "width: 200px;" >
                    <a href="../controllers/ControllerUserStud.php">Elève</a>
                </div>
                <div class="col-sm">
                    <img class=img-fluid src=../images/icons/parents style = "width: 200px;" >
                    <a href="../controllers/ControllerUserParent.php">Parents</a>
                </div>
                <div class="col-sm">
                    <img class=img-fluid src=../images/icons/teacher style = "width: 200px;" >
                    <a href="../controllers/ControllerUserEns.php">Enseignants</a>
                </div>
            </div>
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

    public function userBody() {
        ?>
        <body>
        <?php
        $this->navBar();
        $this->menu();
        $this->contenu();
        $this->footer();
        echo '</body>';
    }

    public function afficherUserPage() {
        echo '<html>';
        $this->head();
        $this->userBody();
        echo '</html>';
    }

}