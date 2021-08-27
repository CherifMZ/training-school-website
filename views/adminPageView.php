<?php

session_start();
if (!isset($_SESSION['idtype'])=='6') {
    header('Location: ../index.php');
}

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerAdminPage.php');

class adminPageView {
    public function head() {
        ?>
        <head>
            <title>EL AMAL ACADEMY</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/adminPage.css">
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
                <li><a  class="optional" href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a  class="optional" href="../controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a  class="optional" href="../controllers/contactController.php">Contact</a></li>
            </ul>
        </div>

        <br>
        <?php
    }

    public function contenu() {
        ?>
        <div class="container-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/admin/article.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Gestion des articles</h4>
                        <a href="../controllers/gestionArticleController.php">Cliquez ici</a>
                    </div>
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/admin/school.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Gestion de la presentation de l'école</h4>
                        <a href="../controllers/ControllerGestionPresentation.php">Cliquez ici</a>
                    </div>
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/admin/edt.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Gestion des emplois du temps</h4>
                        <a href="../controllers/ControllerGestionEdt.php">Cliquez ici</a>
                    </div>
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/admin/ens.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Gestion des enseignants</h4>
                        <a href="../controllers/ControllerGestionens.php">Cliquez ici</a>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/admin/users.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Gestion des utilisateurs</h4>
                        <a href="../controllers/ControllerUser.php">Cliquez ici</a>
                    </div>
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/admin/resto.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Gestion de la restauration</h4>
                        <a href="../controllers/ControllerRestauration.php">Cliquez ici</a>
                    </div>
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/admin/contact.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Gestion des contacts</h4>
                        <a href="../controllers/ControllerGestionContact.php">Cliquez ici</a>
                    </div>
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/admin/diapo.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Gestion des diaporamas</h4>
                        <a href="../controllers/ControllerParametre.php">Cliquez ici</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
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
                <li><a class="optional" href="../controllers/espaceEnsController.php">Espace Enseignant</a></li>
                <li><a href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a href="../controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a href="../controllers/contactController.php">Contact</a></li>
                <li><a href="../logout.php">Déonnexion</a></li>
            </ul>
        </footer>
        <?php
    }

    public function aBody() {
        ?>
        <body>
        <?php
            $this->navBar();
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