<?php

//retourner les information de la restauration pour les trois cycles

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerRestoInfo.php');

class restoInfoModel {

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

    public function getMenu() {
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = $conn->prepare("SELECT dateR, plat, dessert FROM restauration");
        $sql->execute();

        return $sql;
    }

}
