<?php

session_start();

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerAccueil.php');

class accueilView {
    public function head() {
        ?>
        <head>
            <title>EL AMAL ACADEMY</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/pageAccueil.css">
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
            <li class="left"><img src="images/logos/laurel.png"></li>
            <li class="middle"><a href="index.php">El Amal Academy</a></li>
            <li class="right"><a href="#twitter">Twitter</a></li>
            <li class="right"><a href="#instagram">Instagram</a></li>
            <li class="right"><a href="#facebook">Facebook</a></li>
            <li class="right"><a href="#linkedin">Linkedin</a></li>
        </ul>
        <br><br>
        <?php
    }

    public function diapor() {
        ?>
        <!-- Diaporma -->
        <center>
            <div class="diaporam" style="width:100%">
            <?php

                $control = new ControllerAccueil();
                $qtf = $control->getImage();

                foreach ($qtf as $row) {
                    echo "<img class='diapo' src=".$row['source']." style = 'width: 70%;'>";
                }
            ?>

            </div>
        </center>
        <br>
        <script>
            var myIndex = 0;
            diapoImage();

            function diapoImage() {
                var i;
                var x = document.getElementsByClassName("diapo");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";  
                }
                myIndex++;
                if (myIndex > x.length) {
                    myIndex = 1
                }    
                x[myIndex-1].style.display = "block";  
                setTimeout(diapoImage, 3000); //3000 pour 3 secondes
            }
        </script>

        <?php
    }

    public function menu() {
        ?>
        <div class="menuHorizontal">
            <ul>
                <li><a class="horizontal" href="index.php">Page d'Accueil</a></li>
                <li><a class="optional" href="controllers/ControllerPresentation.php">Présentation de l'école</a></li>
                <li><a class="optional" href="controllers/ControllerCyclePrimaire.php">Cycle Primaire</a></li>
                <li><a class="optional" href="controllers/ControllerCycleMoyen.php">Cycle Moyen</a></li>
                <li><a class="optional" href="controllers/ControllerCycleSec.php">Cycle Secondaire</a></li>
                <li><a class="optional" href="controllers/ControllerEspaceEns.php">Espace Enseignant</a></li>
                <li><a class="optional" href="controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a class="optional" href="controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a class="optional" href="controllers/contactController.php">Contact</a></li>
            </ul>
        </div>
        <br>
        <?php
    }

    public function contenu() {
        ?>
        <!-- Zone du contenu -->
        <div class="container-fluid" id="article">
        <?php
            $control = new ControllerAccueil();
            $qtf = $control->getArticle();

            echo '<div class="row">';

            foreach ($qtf as $row) {
                $_SESSION['idarticle'] = $row['id'];
                $id = $row['id'];
                echo '<div class="col-md-3">';
                echo 
                        "<img class=img-fluid src=".$row['photo']." style = 'width: 320px;'>".
                        "<h2 class='text-truncate' style ='max-width: 100%;'>".$row['titre']."</h2>".
                        "<p class='text-truncate'>".$row['description']."</p>";
                        ?>

                        <div id="remove_row">
                            <a href="http://localhost/latreche_mohamed_cherif_zouaoui_SIL1/controllers/ControllerAfficherPlus.php?id=<?php echo $id; ?>">
                            Afficher Plus</a>
                        </div>
                        <?php
                echo '</div>';
            }   
        ?>
            </div>
        </div>   
        <br>
        <p><a href="views/PlusAncien.php">Articles plus anciens</a></p>
        <?php
    }

    public function footer() {
        ?>
        <!-- Footer -->
        <footer class=footer">
            <ul>
                <li><a href="index.php">Page d'Accueil</a></li>
                <li><a href="controllers/ControllerPresentation.php">Présentation de l'école</a></li>
                <li><a class="optional" href="controllers/ControllerCyclePrimaire.php">Cycle Primaire</a></li>
                <li><a class="optional" href="controllers/ControllerCycleMoyen.php">Cycle Moyen</a></li>
                <li><a class="optional" href="controllers/ControllerCycleSec.php">Cycle Secondaire</a></li>
                <li><a class="optional" href="controllers/ControllerEspaceEns.php">Espace Enseignant</a></li>
                <li><a href="controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a href="controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a href="controllers/contactController.php">Contact</a></li>
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
            $this->diapor();
            $this->menu();
            $this->contenu();
            $this->footer();
            echo '</body>';
    }

    public function afficherAccueilPage() {
        echo '<html>';
        $this->head();
        $this->aBody();
        echo '</html>';
    }

}