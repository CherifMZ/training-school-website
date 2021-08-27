<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerUserEns.php');

session_start();
if (!isset($_SESSION['idtype'])=='6') {
    header('Location: ../index.php');
  }

class userEnsView {
    public function head() {
        ?>
        <head>
          <title>Gestion des Enseignants</title>
          <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet" href="../css/register.css">
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
                <li><a  class="optional" href="#about">Espace élèves</a></li>
                <li><a  class="optional" href="views/contactView.php">Espace parents</a></li>
                <li><a  class="optional" href="../controllers/contactController.php">Contact</a></li>
            </ul>
        </div>
        <br>
        <?php
    }
    public function register() {
        ?>
            <h2>Inscription Enseignant</h2>
            <form method="post">
                <div class="information">
                    <label for="nom"><b>Nom</b></label>
                    <input type="text" id="nom" placeholder="Entrer votre nom" name="nom" required>

                    <label for="prenom"><b>Prenom</b></label>
                    <input type="text" id="prenom" placeholder="Entrer votre prenom" name="prenom" required>

                    <label for="adresse"><b>Adresse</b></label>
                    <input type="text" id="adresse" placeholder="Entrer votre adresse" name="adresse"required>

                    <label for="phoneN"><b>Numéro de téléphone</b></label>
                    <input type="text" id="phoneN" placeholder="Entrer votre numéro" name="phoneN" required>

                    <label for="email"><b>Email</b></label>
                    <input type="text" id="email" placeholder="Entrer votre email" name="email" required>

                    <label for="psw"><b>Mot de passe</b></label>
                    <input type="password" id="psw" placeholder="Entrer votre mot de passe" name="psw" required>
                
                    <input id="unsub" type="submit" value="Inscription" name="submit">
                </div>
            </form>
        <?php
            $controler = new ControllerUserEns();
            $controler->ajoutEns();
        ?>

            <?php
    }

    public function supprimer() {
                ?>
                    <h2>Suppression Enseignant</h2>
                    <form method="post">
                        <div class="information">
                            <label for="nom"><b>Nom</b></label>
                            <input type="text" id="nom" placeholder="Entrer votre nom" name="nom" required>
                            <input id="unsub2" type="submit" value="Supprimer" name="submit2">
                        </div>
                    </form>
                <?php
                    $controler = new ControllerUserEns();
                    $controler->suppEns();
                ?>
                    <?php
    }

    public function modif() {
        ?>
            <h2>Modification des enseignants</h2>
            <br>
            <form method="post">

                <div class="information">
                <label for="nom"><b>ID</b></label>
                    <input type="text" id="idE" placeholder="Entrer votre nom" name="idE" required>
                    
                    <label for="nom"><b>Nom</b></label>
                    <input type="text" id="nom" placeholder="Entrer votre nom" name="nom">

                    <label for="prenom"><b>Prenom</b></label>
                    <input type="text" id="prenom" placeholder="Entrer votre prenom" name="prenom">

                    <label for="adresse"><b>Adresse</b></label>
                    <input type="text" id="adresse" placeholder="Entrer votre adresse" name="adresse">

                    <label for="phoneN"><b>Numéro de téléphone</b></label>
                    <input type="text" id="phoneN" placeholder="Entrer votre numéro" name="phoneN">

                    <label for="phoneN"><b>Numéro de téléphone 2</b></label>
                    <input type="text" id="phoneN2" placeholder="Entrer votre numéro" name="phoneN2">

                    <label for="phoneN"><b>Numéro de téléphone 3</b></label>
                    <input type="text" id="phoneN3" placeholder="Entrer votre numéro" name="phoneN3">

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
                $controler = new ControllerUserEns();
                $controler->modif();
            ?>

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
    $this->register();
    $this->supprimer();
    $this->modif();
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
