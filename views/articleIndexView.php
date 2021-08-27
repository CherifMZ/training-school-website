<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerArticleIndex.php');

session_start();
if (!isset($_SESSION['idtype'])=='6') {
    header('Location: ../index.php');
  }

class articleIndexView {
    public function head() {
        ?>
        <head>
            <title>Gestion des Articles</title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/gestArticle.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <li><a href="../controllers/contactController.php">Contact</a></li>
            </ul>
        </div>
        
<br>
<?php
    }

    public function Contenu() {
        ?>
        <!-- Zone du contenu -->
        <h2>Gestion des articles</h2>
        <br>
        <form method="post">
            <div class="article">
                <h4>Ajouter un article</h4>
                <br>
                <label for="titre"><b>Titre</b></label>
                <input type="text" id="titre" placeholder="Entrer le titre de l'article" name="titre" required>

                <label for="photo"><b>Image</b></label>
                <input type="text" id="photo" placeholder="Entrer le lien vers l'image" name="photo" required>

                <label for="descr"><b>Description</b></label>
                <input type="text" id="descr" placeholder="Entrer une description de l'article" name="descr"required>
                        
                <input id="unsub" type="submit" value="Ajouter" name="submit">
            </div>
        </form>
<?php
    $controler = new ControllerArticleIndex();
    $controler->ajouterArticle();
    }

    public function Contenu2() {
        ?>
        <form method="post">
            <div class="article">
                <h4>Modifier un article</h4>
                <br>
                <label for="idN2"><b>ID</b></label>
                <input type="text" id="idN2" placeholder="Entrer le titre de l'article" name="idN2">

                <label for="titre2"><b>Titre</b></label>
                <input type="text" id="titre2" placeholder="Entrer le titre de l'article" name="titre2">

                <label for="photo2"><b>Image</b></label>
                <input type="text" id="photo2" placeholder="Entrer le lien vers l'image" name="photo2">

                <label for="descr2"><b>Description</b></label>
                <input type="text" id="descr2" placeholder="Entrer une description de l'article" name="descr2">
                            
                <br>

                <input id="unsub2" type="submit" value="Modifier" name="submit2">
            </div>
        </form>
    <?php
        $controler = new ControllerArticleIndex();
        $controler->modif();
    }

    public function Contenu3() {
        ?>       
        <form method="post">
            <div class="article">
                <h4>Supprimer un article</h4>
                <br>
                <label for="idN3"><b>ID</b></label>
                <input type="text" id="idN3" placeholder="Entrer le titre de l'article" name="idN3">
                        
                <input id="unsub3" type="submit" value="Supprimer" name="submit3">
            </div>
        </form>
        <?php
            $controler = new ControllerArticleIndex();
            $controler->supp();
        ?>
    <br>
        <?php
    }

public function contenu4() {
        ?>
        <h4>Liste des articles</h4>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">titre</th>
                    <th scope="col">Chemin vers la photo</th>
                    <th scope="col">description</th>
                </tr>
            </thead>
            <tbody>
        <?php
            $controller = new ControllerArticleIndex();
            $qtf = $controller->getList();

            foreach ($qtf as $row) {
         
                echo 
                    "<tr>" .
                    "<td>" . $row["id"] . "</td>" .
                    "<td>" . $row["titre"] . "</td>" .
                    "<td>" . $row["photo"] . "</td>" .
                    "<td>" . $row["description"] . "</td>" .
                    "</tr>";
            }
                echo "</tbody>";

        ?>
        </table>  
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
                <li><a class="optional" href="../controllers/ControllerEspaceEns.php">Espace Enseignant</a></li>
                <li><a href="../controllers/espaceEleveController.php">Espace élèves</a></li>
                <li><a class="optional" href="controllers/ControllerEspaceParent.php">Espace parents</a></li>
                <li><a href="../controllers/contactController.php">Contact</a></li>
            </ul>
        </footer>
        <?php
    }

    public function articleBody() {
        ?>
        <body>
        <?php
        $this->navBar();
        $this->menu();
        $this->Contenu();
        $this->Contenu2();
        $this->Contenu3();
        $this->Contenu4();
        $this->footer();
        echo '</body>';
    }

    public function afficherArticlePage() {
        echo '<html>';
        $this->head();
        $this->articleBody();
        echo '</html>';
    }

}