<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerAffichageEdt.php');

class affichageEdtModel {

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

    public function getedt($id) {

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = $conn->prepare("SELECT E.jour, E.heure1, E.heure2, E.heure3, C.nomc FROM edt E JOIN classe C
        ON C.id=E.idClasse where C.type=?");
        $sql->execute(array($id));

        return $sql;

    }

    public function toS($string) {

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $stmt = $conn->prepare("SELECT nom FROM module where id=?");
        $stmt->execute(array($string)); 
        $c = $stmt->fetch();

        return $c['nom'];
    }
    

}