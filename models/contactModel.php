<?php

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/contactController.php');

class contactModel {

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

    public function getContacts() {
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);
        $sql = $conn->prepare("SELECT * FROM contact");
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        $sql->execute();
        $row=$sql->fetch();//que l premiere ligne

        return $row;
    }

}
?>
	