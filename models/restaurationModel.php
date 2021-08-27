<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerRestauration.php');

class restaurationModel {

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

    public function ajoutMenu() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit"])) {

            $plat = $_POST['plat'];
            $dessert = $_POST['dessert'];
            $date = $_POST['date'];

                $sql = "INSERT INTO restauration (dateR,plat,dessert) VALUES (?,?,?)";
                $conn->prepare($sql)->execute([$date,$plat,$dessert]);

                return "true";
        }
    }

    public function supp() {
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit2"])) {

            $id = $_POST['idN'];

            $sql = "DELETE FROM restauration where id=?";
            $conn->prepare($sql)->execute([$id]);

            return "true";
        }

    }

}
?>