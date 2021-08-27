<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerInfoEleve.php');

class infoEleveModel {

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

        $sql = "SELECT  E.id,nom,prenom,dateNaissance,annee,nomc FROM eleve E JOIN classe C ON 
        E.idClasse=C.id WHERE E.id=?";
        $query = $conn->prepare($sql);
        $query->execute(array($_SESSION['ideleve']));

        return $query;
    }

    public function getExtraScolaire() { //activités extra Scolaires

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = "SELECT  A.id, A.nom FROM eleve E JOIN activite A ON 
        E.id=A.idEleve WHERE E.id=?";
        $query = $conn->prepare($sql);
        $query->execute(array($_SESSION['ideleve']));

        return $query;
    }

    public function getNote() { //retourner les notes

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = "SELECT  M.nom, N.valeur FROM eleve E JOIN note N ON 
        E.id=N.idEleve JOIN module M ON M.id=N.idModule WHERE E.id=?";
        $query = $conn->prepare($sql);
        $query->execute(array($_SESSION['ideleve']));

        return $query;
    }

    public function getEDT() {//retourner ID classe

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $stmt = $conn->prepare("SELECT idClasse FROM eleve WHERE id=?");
        $stmt->execute([$_SESSION['ideleve']]); 
        $c = $stmt->fetch();
                    
        return $c["idClasse"];
    }

    public function getJour($idC) {//retourn les lignes de l'emploi du temps

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = "SELECT jour, heure1, heure2, heure3 FROM edt WHERE idClasse=?";
        $query = $conn->prepare($sql);
        $query->execute(array($idC));

        return $query;
    }

    public function getNom($heure) { //retourne le nom du module

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $stmt = $conn->prepare("SELECT nom FROM module WHERE id=?");
        $stmt->execute([$heure]); 
        $c = $stmt->fetch();
        
        return $c["nom"];
    }
}