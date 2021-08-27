<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerGestionContact.php');

session_start();
if (!isset($_SESSION['idtype'])=='6') {
    header('Location: ../index.php');
  }

class gestionContactView {
    public function head() {
        ?>
        <head>
            <title>Gestion des Contacts</title>
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

        <center><h2>Gestion des Contacts</h2></center>
        <br>
        <h4>Liste des contacts</h4>
        <br>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Adresse</th>
                    <th scope="col">Téléphone 1</th>
                    <th scope="col">Téléphone 2</th>
                    <th scope="col">Fax</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $control = new ControllerGestionContact();
            $qtf = $control->getSrc();

            foreach ($qtf as $row) {
         
                echo 
                    "<tr>" .
                    "<td>" . $row["id"] . "</td>" .
                    "<td>" . $row["adresse"] . "</td>" .
                    "<td>" . $row["teleph1"] . "</td>" .
                    "<td>" . $row["teleph2"] . "</td>" .
                    "<td>" . $row["fax"] . "</td>" .
                    "</tr>";
            }
                echo "</tbody>";

        ?>
        </table> 
       
        <br>
        <h4>Ajouter un Contact</h4>
        <br>

        <div class="contenaireResto">
                <form method="post">
                <div class="ligne">
                    <div class="nom">
                        <label for="adr">Adresse</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="adr" name="adr" placeholder="Entrer l'adresse" required>
                    </div>
                </div>
                <div class="ligne">
                    <div class="nom">
                        <label for="t1">Téléphone 1</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="t1" name="t1" placeholder="Entrer un numéro de téléphone" required>
                    </div>
                </div>
                <div class="ligne">
                    <div class="nom">
                        <label for="t2">Téléphone 2</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="t2" name="t2" placeholder="Entrer un numéro de téléphone" required>
                    </div>
                </div>
                <div class="ligne">
                    <div class="nom">
                        <label for="fax">Fax</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="fax" name="fax" placeholder="Entrer un fax" required>
                    </div>
                </div>
                <br>
                <div class="ligne">
                    <input id="submit" type="submit" value="Ajouter" name="submit">
                </div>
                </form>
            </div>
        <?php
            $controler = new ControllerGestionContact();
            $controler->ajoutC();
        ?>
        </div>
        <br>
        <?php
    }

    public function modifier() {
        ?>

        <br>
        <h4>Modifier un Contact</h4>
        <br>

        <div class="contenaireResto">
                <form method="post">
                <div class="ligne">
                    <div class="idN1">
                        <label for="adr">ID</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="idN1" name="idN1" placeholder="Entrer ID">
                    </div>
                </div>
                <div class="ligne">
                    <div class="nom">
                        <label for="adr1">Adresse</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="adr1" name="adr1" placeholder="Entrer l'adresse">
                    </div>
                </div>
                <div class="ligne">
                    <div class="nom">
                        <label for="t11">Téléphone 1</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="t11" name="t11" placeholder="Entrer un numéro de téléphone">
                    </div>
                </div>
                <div class="ligne">
                    <div class="nom">
                        <label for="t21">Téléphone 2</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="t21" name="t21" placeholder="Entrer un numéro de téléphone">
                    </div>
                </div>
                <div class="ligne">
                    <div class="nom">
                        <label for="fax1">Fax</label>
                    </div>
                    <div class="entree">
                        <input type="text" id="fax1" name="fax1" placeholder="Entrer un fax">
                    </div>
                </div>
                <br>
                <div class="ligne">
                    <input id="submit2" type="submit" value="Modifier" name="submit2">
                </div>
                </form>
            </div>
        <?php

            $controler = new ControllerGestionContact();
            $controler->modifC();
        ?>
        </div>
        <br>
        <?php

    }

    public function supp() {
        ?>

        <br>
        <h4>Supprimer un Contact</h4>
        <br>

        <div class="contenaireResto">
                <form method="post">
                    <div class="ligne">
                        <div class="nom">
                            <label for="idN">ID</label>
                        </div>
                        <div class="entree">
                            <input type="text" id="idN" name="idN" placeholder="Entrer ID">
                        </div>
                    </div>
                    <br>
                    <div class="ligne">
                        <input id="submit3" type="submit" value="Supprimer" name="submit3">
                    </div>
                </form>
            </div>
        <?php

            $controler = new ControllerGestionContact();
            $controler->supp();
        ?>
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

    public function contBody() {
        ?>
        <body>
        <?php
        $this->navBar();
        $this->menu();
        $this->contenu();
        $this->modifier();
        $this->supp();
        $this->footer();
        echo '</body>';
    }

    public function afficherContactPage() {
        echo '<html>';
        $this->head();
        $this->contBody();
        echo '</html>';
    }

}