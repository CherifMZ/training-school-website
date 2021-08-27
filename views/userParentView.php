<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerUserParent.php');

class userParentView {
    public function head() {
        ?>
        <head>
          <title>Gestion des Parents</title>
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

    public function inscription() {
        ?>
            <h2>Inscription des Parents</h2>
            <form method="post">
                <div class="image">
                    <center><img src="../images/logos/laurel.png" style ="width: 150px; height: 150px;"></center>
                </div>

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

                    <label for="email"><b>Email</b></label>
                    <input type="text" id="email" placeholder="Entrer votre email" name="email" required>

                    <label for="psw"><b>Mot de passe</b></label>
                    <input type="password" id="psw" placeholder="Entrer votre mot de passe" name="psw" required>
                
                    <input id="unsub" type="submit" value="Inscription" name="submit">
                </div>
            </form>

            <?php
                $controler = new ControllerUserParent();
                $controler->insc();
            ?>

        <?php
    }

    public function supp() {
        ?>
        <h2>Suppression des Parents</h2>
            <form method="post">

                <div class="information">
                    <label for="nom2"><b>ID</b></label>
                    <input type="text" id="nom2" placeholder="Entrer un ID" name="nom2" required>
                
                    <input id="unsub2" type="submit" value="Supprimer" name="submit2">
                </div>
            </form>

            <?php
                $controler = new ControllerUserParent();
                $controler->supp();
            ?>

<?php
    }

    public function modif() {
        ?>
            <h2>Modification des Parents</h2>
            <br>
            <form method="post">

                <div class="information">
                <label for="id3"><b>ID</b></label>
                    <input type="text" id="idE3" placeholder="Entrer votre nom" name="idE3" required>
                    
                    <label for="nom3"><b>Nom</b></label>
                    <input type="text" id="nom3" placeholder="Entrer votre nom3" name="nom3">

                    <label for="prenom3"><b>Prenom</b></label>
                    <input type="text" id="prenom3" placeholder="Entrer votre prenom" name="prenom3">

                    <label for="dateN3"><b>Date de Naissance</b></label>
                    <br><br>
                    <input type="date" id="dateN3" placeholder="Entrer votre date de naissance" name="dateN3">

                    <br><br>

                    <label for="adresse3"><b>Adresse</b></label>
                    <input type="text" id="adresse3" placeholder="Entrer votre adresse" name="adresse3">

                    <label for="phoneN3"><b>Numéro de téléphone</b></label>
                    <input type="text" id="phoneN3" placeholder="Entrer votre numéro" name="phoneN3">

                    <label for="phoneN23"><b>Numéro de téléphone 2</b></label>
                    <input type="text" id="phoneN23" placeholder="Entrer votre numéro" name="phoneN23">

                    <label for="phoneN33"><b>Numéro de téléphone 3</b></label>
                    <input type="text" id="phoneN33" placeholder="Entrer votre numéro" name="phoneN33">

                    <label for="email3"><b>Email</b></label>
                    <input type="text" id="email3" placeholder="Entrer votre email" name="email3">

                    <label for="psw3"><b>Mot de passe</b></label>
                    <input type="password" id="psw3" placeholder="Entrer votre mot de passe" name="psw3">
                
                    <input id="unsub3" type="submit" value="Modifier" name="submit3">
                </div>
            </form>

            <?php
                $controler = new ControllerUserParent();
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
