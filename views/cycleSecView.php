<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerCycleSec.php');

class cycleSecView {
    public function head() {
        ?>
        <head>
            <title>EL AMAL ACADEMY</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/pageAccueil.css">
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
                <li><a class="horizontal" href="../index.php">Page d'Accueil</a></li>
                <li><a  class="optional" href="../controllers/ControllerPresentation.php">Présentation de l'école</a></li>
                <li><a class="optional" href="../controllers/ControllerCyclePrimaire.php">Cycle Primaire</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleMoyen.php">Cycle Moyen</a></li>
                <li><a class="optional" href="../controllers/ControllerCycleSec.php">Cycle Secondaire</a></li>
                <li><a class="optional" href="../controllers/ControllerEspaceEns.php">Espace Enseignant</a></li>
                <li><a href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a href="../controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a  class="optional" href="../controllers/loginController.php">Contact</a></li>
            </ul>
        </div>
        <br>
        <?php
    }

    public function contenu() {//premier cadre
        ?>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/cycle/edt.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Emploi du temps</h4>
                        <p>Vous trouverez ici l'emploi du temps global du cycle Secondaire</p>
                        <a href="http://localhost/latreche_mohamed_cherif_zouaoui_SIL1/controllers/ControllerAffichageEdt.php?id=<?php echo 4; ?>">Cliquez ici</a>
                    </div>
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/cycle/liste.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Liste des enseignants</h4>
                        <p>Vous trouverez ici la liste des enseignants du cycle Secondaire</p>
                        <a href="http://localhost/latreche_mohamed_cherif_zouaoui_SIL1/controllers/ControllerListeEns.php?id=<?php echo 4; ?>">
                        Cliquez ici</a>
                    </div>
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/cycle/info.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Informations pratiques</h4>
                        <p>Vous trouverez ici les informations pratiques du cycle Secondaire</p>
                        <a href="../views/informationPratiqueS.php">Cliquez ici</a>
                    </div>
                    <div class="col-sm-3">
                        <img class=img-fluid src="../images/cycle/resto.png" style = 'width: 320px;'> 
                        <h4 class='text-truncate' style ='max-width: 100%;'>Informations sur la restauration</h4>
                        <p>Vous trouverez ici les informations sur la restauration</p>
                        <a href="../controllers/ControllerRestoInfo.php">Cliquez ici</a>
                    </div>
                </div>

                <br>
        <?php //deuxième cadre
            $control = new ControllerCycleSec();
            $qtf = $control->getArticle();

            echo '<div class="row">';

            foreach ($qtf as $row) {
                $array = explode(",",$row["checkbox"]);
                if (in_array(" secondaire",$array) || in_array("secondaire", $array)) {
                    echo '<div class="col-md-3">';
                    echo 
                                "<img class=img-fluid src=".$row['photo']." style = 'width: 320px;'>".
                                "<h2 class='text-truncate' style ='max-width: 100%;'>".$row['titre']."</h2>".
                                "<p>".$row['description']."</p>";

                    echo '</div>';

                }
            }   
        ?>
            </div>
        </div>
        <?php
    }

    public function footer() {
        ?>
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
                <li><a href="../controllers/loginController.php">Contact</a></li>
            </ul>
        </footer>
        <?php
    }

    public function pBody() {
        ?>
        <body>
        <?php
        $this->navBar();
        $this->menu();
        $this->contenu();
        $this->footer();
        echo '</body>';
    }

    public function afficherSecPage() {
        echo '<html>';
        $this->head();
        $this->pBody();
        echo '</html>';
    }

}