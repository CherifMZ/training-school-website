<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerGestionens.php');

class GestionEnsModel {

    private $db="mysql:dbname=tdw;hostname=127.0.0.1;";
    private $busername = "root";
    private $bpassword = "";

    private function connexion($db,$busername,$bpassword) {

                try {
                    $conn = new PDO($db, $busername, $bpassword);
                    $conn->exec("SET CHARACTER SET utf8");
                }
                catch(PDOException $e)
                {
                    echo "Connection failed: " . $e->getMessage();
                    exit();
                }
                return $conn;
    }

    public function heurT(){

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit1"])) {

            $nom = $_POST['nom1'];
            $nomC = $_POST['nomClass'];
            $hour = $_POST['hour'];

            //selectionner l'enseignant
            $stmt = $conn->prepare("SELECT id FROM enseignant WHERE nom=?");
            $stmt->execute([$nom]); 
            $user = $stmt->fetch();
                
            $idEns = $user["id"];

            //selectionner la classe
            $stmt = $conn->prepare("SELECT id FROM classe WHERE nomc=?");
            $stmt->execute([$nomC]); 
            $class = $stmt->fetch();
                
            $idClass = $class["id"];

            //inserer les heures de travail par groupe et enseignant
            $sql = "INSERT INTO htravail (hour,idEns,idClass) VALUES (?,?,?)";

            $conn->prepare($sql)->execute([$hour,$idEns,$idClass]);

            echo "<script type='text/javascript'>window.top.location='ControllerGestionens.php';</script>"; exit;

        }

    }

    public function heurTM(){ //modifier heure de travail

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit5"])) {

            $nom = $_POST['nom5'];
            $nomC = $_POST['nomClass5'];
            $hour = $_POST['hour5'];

            //selectionner l'enseignant
            $stmt = $conn->prepare("SELECT id FROM enseignant WHERE nom=?");
            $stmt->execute([$nom]); 
            $user = $stmt->fetch();
                
            $idEns = $user["id"];

            //selectionner la classe
            $stmt = $conn->prepare("SELECT id FROM classe WHERE nomc=?");
            $stmt->execute([$nomC]); 
            $class = $stmt->fetch();
                
            $idClass = $class["id"];

            $sql = "UPDATE htravail SET hour=? WHERE (idEns=? AND idClass=?)";
            $conn->prepare($sql)->execute([$hour,$idEns,$idClass]);

            echo "<script type='text/javascript'>window.top.location='ControllerGestionens.php';</script>"; exit;

        }

    }

    public function heurTS(){ //supprimer heure de travail

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit6"])) {

            $nom = $_POST['nom6'];
            $nomC = $_POST['nomClass6'];
            $hour = $_POST['hour6'];

            //selectionner l'enseignant
            $stmt = $conn->prepare("SELECT id FROM enseignant WHERE nom=?");
            $stmt->execute([$nom]); 
            $user = $stmt->fetch();
                
            $idEns = $user["id"];

            //selectionner la classe
            $stmt = $conn->prepare("SELECT id FROM classe WHERE nomc=?");
            $stmt->execute([$nomC]); 
            $class = $stmt->fetch();
                
            $idClass = $class["id"];

            $sql = "DELETE from htravail WHERE (hour=? AND idEns=? AND idClass=?)";
            $conn->prepare($sql)->execute([$hour,$idEns,$idClass]);

            echo "<script type='text/javascript'>window.top.location='ControllerGestionens.php';</script>"; exit;

        }

    }


    public function heurR(){

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);
        
        if (isset($_POST["submit2"])) {

            $nom = $_POST['nom2'];
            $recep = $_POST['reception'];

            //selectionner l'enseignant
            $stmt = $conn->prepare("SELECT id FROM enseignant WHERE nom=?");
            $stmt->execute([$nom]); 
            $user = $stmt->fetch();
                
            $idEns = $user["id"];

            //renvoyer le nombre de ligne pour incrementer le id 
            $nRows = $conn->query('SELECT count(*) FROM hreception')->fetchColumn(); 

            //inserer les heures de travail par groupe et enseignant
            $sql = "INSERT INTO hreception (id,hour,idEns) VALUES (?,?,?)";

            $conn->prepare($sql)->execute([$nRows+1,$recep,$idEns]);

            echo "<script type='text/javascript'>window.top.location='ControllerGestionens.php';</script>"; exit;
        }
    }

    public function heurRM(){

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);
        
        if (isset($_POST["submit7"])) {

            $nom = $_POST['nom7'];
            $recep = $_POST['reception7'];

            //selectionner l'enseignant
            $stmt = $conn->prepare("SELECT id FROM enseignant WHERE nom=?");
            $stmt->execute([$nom]); 
            $user = $stmt->fetch();
                
            $idEns = $user["id"];

            $sql = "UPDATE hreception SET hour=? WHERE idEns=? ";
            $conn->prepare($sql)->execute([$recep,$idEns]);

            echo "<script type='text/javascript'>window.top.location='ControllerGestionens.php';</script>"; exit;
        }
    }

    public function heurRS(){

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);
        
        if (isset($_POST["submit8"])) {

            $nom = $_POST['nom8'];
            $recep = $_POST['reception8'];

            //selectionner l'enseignant
            $stmt = $conn->prepare("SELECT id FROM enseignant WHERE nom=?");
            $stmt->execute([$nom]); 
            $user = $stmt->fetch();
                
            $idEns = $user["id"];

            $sql = "DELETE from hreception WHERE hour=? AND idEns=?";
            $conn->prepare($sql)->execute([$recep,$idEns]);

            echo "<script type='text/javascript'>window.top.location='ControllerGestionens.php';</script>"; exit;
        }
    }

    public function classN(){

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);
        
        if (isset($_POST["submit3"])) {

            $nom = $_POST['nom3'];
            $classN = $_POST['className'];

            //selectionner l'enseignant
            $stmt = $conn->prepare("SELECT id FROM enseignant WHERE nom=?");
            $stmt->execute([$nom]); 
            $user = $stmt->fetch();
                
            $idEns = $user["id"];

            //selectionner la classe
            $stmt = $conn->prepare("SELECT id FROM classe WHERE nomc=?");
            $stmt->execute([$classN]); 
            $class = $stmt->fetch();
                
            $idClass = $class["id"];

            //inserer dans la table enseignant, l'id de la classe correspendant
            $sql = "UPDATE enseignant SET idClasse=? WHERE id=?";
            $conn->prepare($sql)->execute([$idClass, $idEns]);

            echo "<script type='text/javascript'>window.top.location='ControllerGestionens.php';</script>"; exit;
        }
    }

    public function supprimerC() {
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);
        
        if (isset($_POST["submit4"])) {

            $nom = $_POST['nom4'];
            $classN = $_POST['className1'];

            if ($classN == '0') {

                $stmt = $conn->prepare("SELECT id FROM enseignant WHERE nom=?");
                $stmt->execute([$nom]); 
                $user = $stmt->fetch();
                    
                $idEns = $user["id"];

                $sql = "UPDATE enseignant SET idClasse=? WHERE id=?";
                $conn->prepare($sql)->execute([null, $idEns]);

            } else {

                $stmt = $conn->prepare("SELECT id FROM enseignant WHERE nom=?");
                $stmt->execute([$nom]); 
                $user = $stmt->fetch();
                    
                $idEns = $user["id"];

                $stmt = $conn->prepare("SELECT id FROM classe WHERE nomc=?");
                $stmt->execute([$classN]); 
                $class = $stmt->fetch();
                    
                $idClass = $class["id"];

                $sql = "UPDATE enseignant SET idClasse=? WHERE id=?";
                $conn->prepare($sql)->execute([$idClass, $idEns]);

            }
            
            echo "<script type='text/javascript'>window.top.location='ControllerGestionens.php';</script>"; exit;
        }
    }
}
?>