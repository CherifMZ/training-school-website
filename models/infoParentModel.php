<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerInfoParent.php');

class infoParentModel {

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

        $sql = "SELECT id, nom, prenom, dateNaissance FROM parent WHERE id=?";
        $query = $conn->prepare($sql);
        $query->execute(array($_SESSION['idparent']));

        return $query;
    }

    public function infoFils() {

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = "SELECT  E.id, E.nom, E.prenom, E.dateNaissance, E.annee, nomc FROM eleve E JOIN parent P ON 
        E.idParent=P.id JOIN classe C ON E.idClasse=C.id WHERE P.id=?";
        $query = $conn->prepare($sql);
        $query->execute(array($_SESSION['idparent']));

        return $query;
    }

    public function noteEnfant() {

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = "SELECT  E.id, E.prenom, M.nom, N.valeur, N.remarque FROM eleve E JOIN note N ON 
        E.id=N.idEleve JOIN module M ON M.id=N.idModule JOIN parent P ON P.id=E.idParent WHERE P.id=?";
        $query = $conn->prepare($sql);
        $query->execute(array($_SESSION['idparent']));

        return $query;
    }

    public function activities() {

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = "SELECT  E.id, E.prenom, A.nom FROM eleve E JOIN activite A ON 
        E.id=A.idEleve JOIN parent P ON P.id=E.idParent WHERE P.id=?";
        $query = $conn->prepare($sql);
        $query->execute(array($_SESSION['idparent']));

        return $query;
    }

    public function getEDT() {//retourner ID classe

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = "SELECT E.idClasse FROM eleve E JOIN parent P ON 
        E.idParent=P.id WHERE P.id=?";
        $query = $conn->prepare($sql);
        $query->execute(array($_SESSION['idparent']));
                    
        return $query;
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

    public function getClass($idC) {

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $stmt = $conn->prepare("SELECT nomc FROM classe WHERE id=?");
        $stmt->execute([$idC]); 
        $result = $stmt->fetch();
        
        return $result["nomc"];
    }
}
