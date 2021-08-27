<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerGestionContact.php');

class gestionContactModel {

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

    public function ajoutContact() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit"])) {

            $adr = $_POST['adr'];
            $t1 = $_POST['t1'];
            $t2 = $_POST['t2'];
            $fax = $_POST['fax'];

            $sql = "INSERT INTO contact (adresse,teleph1,teleph2,fax) VALUES (?,?,?,?)";
            $conn->prepare($sql)->execute([$adr,$t1,$t2,$fax]);

            echo "<script type='text/javascript'>window.top.location='ControllerGestionContact.php';</script>"; exit;
        }
    }

    public function modifierContact() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit2"])) {

            $id = $_POST['idN1'];
            $adr = $_POST['adr1'];
            $t1 = $_POST['t11'];
            $t2 = $_POST['t21'];
            $fax = $_POST['fax1'];

            if (!empty($adr)) {
                $sql = "UPDATE contact SET adresse=? WHERE id=?";
                $conn->prepare($sql)->execute([$adr, $id]);
            }
            if (!empty($t1)) {
                $sql = "UPDATE contact SET teleph1=? WHERE id=?";
                $conn->prepare($sql)->execute([$t1, $id]);
            }
            if (!empty($t2)) {
                $sql = "UPDATE contact SET teleph2=? WHERE id=?";
                $conn->prepare($sql)->execute([$t2, $id]);
            }
            if (!empty($fax)) {
                $sql = "UPDATE contact SET fax=? WHERE id=?";
                $conn->prepare($sql)->execute([$fax, $id]);
            }
        
            echo "<script type='text/javascript'>window.top.location='ControllerGestionContact.php';</script>"; exit;

        }
    }

    public function supp() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit3"])) {
        
            $id = $_POST['idN'];
        
            $sql = "DELETE FROM contact WHERE id =?";
            $query = $conn->prepare($sql);
            $query->execute(array($id));

            echo "<script type='text/javascript'>window.top.location='ControllerGestionContact.php';</script>"; exit;
        }
    }

    public function getSrc() {
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = $conn->prepare("SELECT id, adresse, teleph1, teleph2, fax FROM contact");
        $sql->execute();

        return $sql;
    }

}
?>