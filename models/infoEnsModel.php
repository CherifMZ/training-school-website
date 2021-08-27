<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerInfoEns.php');

class infoEnsModel {

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

    public function getInfo() { //Infos personnelles

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);
        $sql = "SELECT id, nom, prenom, teleph1 FROM enseignant WHERE id=?";
        $query = $conn->prepare($sql);
        $query->execute(array($_SESSION['idens']));

        return $query;
    }

    
    public function getNote() { //liste des notes 
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = "SELECT E.id as id, E.nom as nom, E.prenom as prenom, N.valeur as valeur FROM eleve E JOIN note N ON E.id=N.idEleve WHERE idEns=?";
        $query = $conn->prepare($sql);
        $query->execute(array($_SESSION['idens']));

        return $query;
    }

    public function modif() {

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit"])) {

            $id = $_POST['idN'];
            $note = $_POST['note'];

            if (!empty($note)) {
                $sql = "UPDATE note SET valeur=? WHERE idEleve=?";
                $conn->prepare($sql)->execute([$note, $id]);
            }

        }
    
        return true;
    }

    public function ajout() {

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit2"])) {

            $id = $_POST['idN2'];
            $note = $_POST['note2'];
            $rq = $_POST['rq'];

            $sql = "SELECT id FROM module WHERE idEns=?";
            $query = $conn->prepare($sql);
            $query->execute(array($_SESSION['idens']));

            $row=$query->fetch();

            $sql = "INSERT INTO note (idModule,valeur,idEns,idEleve,remarque) VALUES (?,?,?,?,?)";
            $conn->prepare($sql)->execute([$row['id'], $note, $_SESSION['idens'], $id, $rq]);
        }
    
        return true;
    }

    public function supp() {
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit3"])) {

            $id = $_POST['idN3'];
            $note = $_POST['note3'];

            $sql = "DELETE FROM note WHERE (valeur =? AND idEleve=?)";
            $conn->prepare($sql)->execute([$note, $id]);
        }
    
        return true;
    }
}