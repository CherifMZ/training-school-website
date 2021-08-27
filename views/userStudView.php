<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerUserStud.php');

class userStudView {
    public function head() {
        ?>
        <head>
            <title>Gestion des étudiants</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/register.css">
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
                <li><a  class="optional" href="#news">Présentation de l'école</a></li>
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

    public function liste() {
        ?>
        <h2>Liste des élèves</h2>

        <br>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $control = new ControllerUserStud();
            $qtf = $control->liste();

            foreach ($qtf as $row) {
         
                echo 
                    "<tr>" .
                    "<td>" . $row["id"] . "</td>" .
                    "<td>" . $row["nom"] . "</td>" .
                    "<td>" . $row["prenom"] . "</td>" .
                    "</tr>";
            }
                echo "</tbody>";
        ?>
        </table>  
        <br>

        <?php
    }

    public function inscription() {
        ?>
            <h2>Inscription des élèves</h2>
            <br>
            <form method="post">

                <div class="information">
                    <label for="nom"><b>Nom</b></label>
                    <input type="text" id="nom" placeholder="Entrer votre nom" name="nom" required>

                    <label for="prenom"><b>Prenom</b></label>
                    <input type="text" id="prenom" placeholder="Entrer votre prenom" name="prenom" required>

                    <label for="dateN"><b>Date de Naissance</b></label>
                    <br><br>
                    <input type="date" id="dateN" placeholder="Entrer votre date de naissance" name="dateN" required>

                    <br><br>

                    <label for="adresse"><b>Adresse</b></label>
                    <input type="text" id="adresse" placeholder="Entrer votre adresse" name="adresse"required>

                    <label for="phoneN"><b>Numéro de téléphone</b></label>
                    <input type="text" id="phoneN" placeholder="Entrer votre numéro" name="phoneN" required>

                    <label for="phoneN"><b>Numéro de téléphone 2</b></label>
                    <input type="text" id="phoneN2" placeholder="Entrer votre numéro" name="phoneN2" required>

                    <label for="phoneN"><b>Numéro de téléphone 3</b></label>
                    <input type="text" id="phoneN3" placeholder="Entrer votre numéro" name="phoneN3" required>

                    <label for="cycle"><b>Cycle</b></label>
                    <input type="text" id="cycle" placeholder="Entrer le cycle (2 pour primaire, 3 pour moyen et 4 pour secondaire)" name="cycle" required>

                    <label for="year"><b>Année d'étude</b></label>
                    <input type="text" id="year" placeholder="Entrer votre année d'étude" name="year" required>

                    <label for="nomClass"><b>Classe</b></label>
                    <input type="text" id="nomClass" placeholder="Entrer le nom de la classe" name="nomClass" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text" id="email" placeholder="Entrer votre email" name="email" required>

                    <label for="psw"><b>Mot de passe</b></label>
                    <input type="password" id="psw" placeholder="Entrer votre mot de passe" name="psw" required>
                
                    <input id="unsub" type="submit" value="Inscription" name="submit">
                </div>
            </form>

            <?php
                $controler = new ControllerUserStud();
                $controler->insc();
            ?>

        <?php
    }

    public function supp() {
        ?>
            <h2>Suppression des élèves</h2>
            <br>
            <form method="post">

                <div class="information">
                    <label for="nom"><b>ID</b></label>
                    <input type="text" id="nom" placeholder="Entrer un ID" name="nom" required>
                
                    <input id="unsub2" type="submit" value="Supprimer" name="submit2">
                </div>
            </form>
            <?php
                $controler = new ControllerUserStud();
                $controler->supp();
            ?>

        <?php
    }

    public function modif() {
        ?>
            <h2>Modification des élèves</h2>
            <br>
            <form method="post">

                <div class="information">
                <label for="nom"><b>ID</b></label>
                    <input type="text" id="idE" placeholder="Entrer votre nom" name="idE" required>
                    
                    <label for="nom"><b>Nom</b></label>
                    <input type="text" id="nom" placeholder="Entrer votre nom" name="nom">

                    <label for="prenom"><b>Prenom</b></label>
                    <input type="text" id="prenom" placeholder="Entrer votre prenom" name="prenom">

                    <label for="dateN"><b>Date de Naissance</b></label>
                    <br><br>
                    <input type="date" id="dateN" placeholder="Entrer votre date de naissance" name="dateN">

                    <br><br>

                    <label for="adresse"><b>Adresse</b></label>
                    <input type="text" id="adresse" placeholder="Entrer votre adresse" name="adresse">

                    <label for="phoneN"><b>Numéro de téléphone</b></label>
                    <input type="text" id="phoneN" placeholder="Entrer votre numéro" name="phoneN">

                    <label for="phoneN"><b>Numéro de téléphone 2</b></label>
                    <input type="text" id="phoneN2" placeholder="Entrer votre numéro" name="phoneN2">

                    <label for="phoneN"><b>Numéro de téléphone 3</b></label>
                    <input type="text" id="phoneN3" placeholder="Entrer votre numéro" name="phoneN3">

                    <label for="cycle"><b>Cycle</b></label>
                    <input type="text" id="cycle" placeholder="Entrer le cycle (2 pour primaire, 3 pour moyen et 4 pour secondaire)" name="cycle">

                    <label for="year"><b>Année d'étude</b></label>
                    <input type="text" id="year" placeholder="Entrer votre année d'étude" name="year">

                    <label for="nomClass"><b>Classe</b></label>
                    <input type="text" id="nomClass" placeholder="Entrer le nom de la classe" name="nomClass">

                    <label for="email"><b>Email</b></label>
                    <input type="text" id="email" placeholder="Entrer votre email" name="email">

                    <label for="psw"><b>Mot de passe</b></label>
                    <input type="password" id="psw" placeholder="Entrer votre mot de passe" name="psw">
                
                    <input id="unsub3" type="submit" value="Modifier" name="submit3">
                </div>
            </form>

            <?php
                $controler = new ControllerUserStud();
                $controler->modifier();
            ?>

        <?php
    }

    public function footer() {
        ?>
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
            </ul>
        </footer>
        <?php
    }

    public function registerBody() {
        ?>
        <body>
        <?php
        $this->navBar();
        $this->menu();
        $this->liste();
        $this->inscription();
        $this->supp();
        $this->modif();
        $this->footer();
        echo '</body>';
    }

    public function afficherRegisterPage() {
        echo '<html>';
        $this->head();
        $this->registerBody();
        echo '</html>';
    }

}