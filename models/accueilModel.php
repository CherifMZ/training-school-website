<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerAccueil.php');

class accueilModel {

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

    public function getArticle() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);
        
        $sql = $conn->prepare("SELECT id, titre, photo, description FROM articleindex");
        $sql->execute();

        return $sql;

    }

    public function getImage() { //retourner les images du diaporama
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);
        
        $sql = $conn->prepare("SELECT source FROM diaporama");
        $sql->execute();

        return $sql;

    }

}
?>