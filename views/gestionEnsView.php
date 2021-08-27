<?php

session_start();
if (!isset($_SESSION['idtype'])=='6') {
    header('Location: ../index.php');
  }

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerGestionens.php');

class gestionEnsView {
    public function head() {
        ?>
        <head>
            <title>Gestion des Enseignants</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/gestEns.css">
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

    public function hTravail() {
        ?>

            <h3>Gestion des heures de travail par classe</h3>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <form method="post">
                            <div class="information">
                                <label for="nom1"><b>Nom</b></label>
                                <input type="text" id="nom1" placeholder="Entrer le nom de l'enseignant" name="nom1" required>

                                <label for="nomClass"><b>Nom de la classe</b></label>
                                <input type="text" id="nomClass" placeholder="Entrer le nom de la classe" name="nomClass" required>

                                <label for="hour"><b>Nombre d'heure par classe</b></label>
                                <input type="text" id="adresse" placeholder="Entrer le nombre d'heure" name="hour"required>

                                <input id="unsub1" type="submit" value="Ajouter" name="submit1">
                            </div>
                        </form>
                        <?php
                            $controler = new ControllerGestionens();
                            $controler->hT();
                        ?>
                    </div>
                    <div class="col-sm">
                        <form method="post">
                            <div class="information">
                                <label for="nom5"><b>Nom</b></label>
                                <input type="text" id="nom5" placeholder="Entrer le nom de l'enseignant" name="nom5" required>

                                <label for="nomClass5"><b>Nom de la classe</b></label>
                                <input type="text" id="nomClass5" placeholder="Entrer le nom de la classe" name="nomClass5" required>

                                <label for="hour5"><b>Nombre d'heure par classe</b></label>
                                <input type="text" id="hour5" placeholder="Entrer le nombre d'heure" name="hour5" required>

                                <input id="unsub5" type="submit" value="Modifier" name="submit5">
                            </div>
                        </form>
                        <?php
                            $controler = new ControllerGestionens();
                            $controler->heurTM();
                        ?>
                    </div>
                    <div class="col-sm">
                        <form method="post">
                            <div class="information">
                                <label for="nom6"><b>Nom</b></label>
                                <input type="text" id="nom6" placeholder="Entrer le nom de l'enseignant" name="nom6" required>

                                <label for="nomClass6"><b>Nom de la classe</b></label>
                                <input type="text" id="nomClass6" placeholder="Entrer le nom de la classe" name="nomClass6" required>

                                <label for="hour6"><b>Nombre d'heure par classe</b></label>
                                <input type="text" id="hour6" placeholder="Entrer le nombre d'heure" name="hour6" required>

                                <input id="unsub6" type="submit" value="Supprimer" name="submit6">
                            </div>
                        </form>
                        <?php
                            $controler = new ControllerGestionens();
                            $controler->heurTS();
                        ?>
                    </div>
                </div>
            </div>

            <br><br>

        <?php
    }

    public function hReception() {
        ?>
            <h3>Gestion des heures de réception</h3>
            <br>

            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <form method="post">
                            <div class="information">
                                <label for="nom2"><b>Nom</b></label>
                                <input type="text" id="nom2" placeholder="Entrer le nom de l'enseignant" name="nom2" required>

                                <label for="reception"><b>Heure de réception</b></label>
                                <input type="text" id="reception" placeholder="Entrer l'heure de réception" name="reception" required>
                            
                                <input id="unsub2" type="submit" value="Ajouter" name="submit2">
                            </div>
                        </form>
                        <?php
                            $controler = new ControllerGestionens();
                            $controler->hR();
                        ?>
                    </div>
                    <div class="col-sm">
                        <form method="post">
                            <div class="information">
                                <label for="nom7"><b>Nom</b></label>
                                <input type="text" id="nom7" placeholder="Entrer le nom de l'enseignant" name="nom7" required>

                                <label for="reception7"><b>Heure de réception</b></label>
                                <input type="text" id="reception7" placeholder="Entrer l'heure de réception" name="reception7" required>
                            
                                <input id="unsub7" type="submit" value="Modifier" name="submit7">
                            </div>
                        </form>
                        <?php
                            $controler = new ControllerGestionens();
                            $controler->heurRM();
                        ?>
                    </div>
                    <div class="col-sm">
                        <form method="post">
                            <div class="information">
                                <label for="nom8"><b>Nom</b></label>
                                <input type="text" id="nom8" placeholder="Entrer le nom de l'enseignant" name="nom8" required>

                                <label for="reception8"><b>Heure de réception</b></label>
                                <input type="text" id="reception8" placeholder="Entrer l'heure de réception" name="reception8" required>
                            
                                <input id="unsub8" type="submit" value="Supprimer" name="submit8">
                            </div>
                        </form>
                        <?php
                            $controler = new ControllerGestionens();
                            $controler->heurRS();
                        ?>
                    </div>
                </div>
            </div>

        <?php
    }

    public function classe() {
        ?>
            <h2>Gestion des enseignants</h2>

            <br><br>
            
            <h3>Affecter un enseignant a une classe</h3>

            <form method="post">
                <div class="information">
                    <label for="nom3"><b>Nom de l'enseigant</b></label>
                    <input type="text" id="nom3" placeholder="Entrer le nom de l'enseignant" name="nom3" required>

                    <label for="className"><b>Nom de la classe</b></label>
                    <input type="text" id="className" placeholder="Entrer le nom de la classe" name="className" required>
                
                    <input id="unsub3" type="submit" value="Ajouter" name="submit3">
                </div>
            </form>
            <?php
                $controler = new ControllerGestionens();
                $controler->cE();
            ?>

            <br>
            <h3>Modifier un enseignant d'une classe</h3>

            <form method="post">
                <div class="information">
                    <label for="nom4"><b>Nom de l'enseigant</b></label>
                    <input type="text" id="nom4" placeholder="Entrer le nom de l'enseignant" name="nom4" required>

                    <label for="className"><b>Nom de la classe</b></label>
                    <input type="text" id="className1" placeholder="Entrer le nom de la classe" name="className1" required>
                
                    <input id="unsub4" type="submit" value="Modifier" name="submit4">
                </div>
            </form>
            <p><b>NB : mettez la valeur 0 dans le nom de la classe si vous voulez supprimer l'enseignant de cette classe.</b></p>
            <br>
            <?php
                $controler = new ControllerGestionens();
                $controler->supprimerC();
            ?>

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
                <li><a href="../controllers/contactController.php">Contact</a></li>
            </ul>
        </footer>
        <?php
    }

    public function ensBody() {
        ?>
        <body>
        <?php
        $this->navBar();
        $this->menu();
        $this->classe();
        $this->hTravail();
        $this->hReception();
        $this->footer();
        echo '</body>';
    }

    public function afficherEnsPage() {
        echo '<html>';
        $this->head();
        $this->ensBody();
        echo '</html>';
    }

}