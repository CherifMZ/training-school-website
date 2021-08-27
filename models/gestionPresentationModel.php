<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerGestionPresentation.php');

class gestionPresentationModel {

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

            $photo = $_POST['photo'];
            $parag = $_POST['paragraphe'];

            $nRows = $conn->query('SELECT count(*) FROM presentation')->fetchColumn();

            //inserer
            $sql = "INSERT INTO presentation (id,photo,paragraphe) VALUES (?,?,?)";

            $conn->prepare($sql)->execute([$nRows+1,$photo,$parag]);
            
            echo "<script type='text/javascript'>window.top.location='ControllerGestionPresentation.php';</script>"; exit;
        }
    }

    public function supp() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit3"])) {
        
            $id = $_POST['idN2'];

            $sql = "DELETE FROM presentation WHERE id =?";
            $query = $conn->prepare($sql);
            $query->execute(array($id));

            echo "<script type='text/javascript'>window.top.location='ControllerGestionPresentation.php';</script>"; exit;
        }
    }

    public function modifier() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit2"])) {

            $id = $_POST['idN'];
            $photo = $_POST['photo2'];
            $prg = $_POST['paragraphe2'];

            if (!empty($photo)) {
                $sql = "UPDATE presentation SET photo=? WHERE id=?";
                $conn->prepare($sql)->execute([$photo, $id]);
            }
            if (!empty($prg)) {
                $sql = "UPDATE presentation SET paragraphe=? WHERE id=?";
                $conn->prepare($sql)->execute([$prg, $id]);
            }

            echo "<script type='text/javascript'>window.top.location='ControllerGestionPresentation.php';</script>"; exit;

        }
    }

    public function getList() {
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = $conn->prepare("SELECT * FROM presentation");
        $sql->execute();

        return $sql;
    }
}