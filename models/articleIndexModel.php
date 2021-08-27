<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerArticleIndex.php');

class articleIndexModel {

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

    public function ajout() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit"])) {

            $titre = $_POST['titre'];
            $photo = $_POST['photo'];
            $descr = $_POST['descr'];

            //inserer
            $sql = "INSERT INTO articleindex (titre,photo,description) VALUES (?,?,?)";

            $conn->prepare($sql)->execute([$titre,$photo,$descr]);
            
            return true;

        }
    
    }

    public function supp() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit3"])) {

            $id = $_POST['idN3'];
            
            $sql = "DELETE from articleindex WHERE id=?";

            $conn->prepare($sql)->execute([$id]);
            
            return true;

        }
    
    }

    public function modif() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit2"])) {

            $id = $_POST['idN2'];
            $titre = $_POST['titre2'];
            $photo = $_POST['photo2'];
            $descr = $_POST['descr2'];

            if (!empty($titre)) {
                $sql = "UPDATE articleindex SET titre=? WHERE id=?";
                $conn->prepare($sql)->execute([$titre, $id]);
            }

            if (!empty($photo)) {
                $sql = "UPDATE articleindex SET photo=? WHERE id=?";
                $conn->prepare($sql)->execute([$photo, $id]);
            }

            if (!empty($descr)) {
                $sql = "UPDATE articleindex SET description=? WHERE id=?";
                $conn->prepare($sql)->execute([$descr, $id]);
            }

        }
    
        return true;
    }

    public function getList() {
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = $conn->prepare("SELECT * FROM articleindex");
        $sql->execute();

        return $sql;
    }

}
?>