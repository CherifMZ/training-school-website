<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerParametre.php');

class parametreModel {

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

    public function ajouter() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit"])) {

            $chemin = $_POST['pic'];
            $nRows = $conn->query('SELECT count(*) FROM diaporama')->fetchColumn();

            //inserer
            $sql = "INSERT INTO diaporama (id,source) VALUES (?,?)";
            $stmt= $conn->prepare($sql);
            $stmt->execute([$nRows+1,$chemin]);

            echo "<script type='text/javascript'>window.top.location='ControllerParametre.php';</script>"; exit;
        }
    
    }

    public function getSrc() {
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = $conn->prepare("SELECT id, source FROM diaporama");
        $sql->execute();

        return $sql;
    }

    public function supp() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit2"])) {
        
            $id = $_POST['pic2'];
        
            $sql = "DELETE FROM diaporama WHERE id =?";
            $query = $conn->prepare($sql);
            $query->execute(array($id));

            echo "<script type='text/javascript'>window.top.location='ControllerParametre.php';</script>"; exit;
        }
    }

    public function modifier() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit3"])) {

            $id = $_POST['pic3'];
            $chemin = $_POST['pic4'];

            $sql = "UPDATE diaporama SET source=? WHERE id=?";
            $conn->prepare($sql)->execute([$chemin, $id]);

            echo "<script type='text/javascript'>window.top.location='ControllerParametre.php';</script>"; exit;
        }
    }

}
?>