<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerGestionEdt.php');

class gestionEdtModel {

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

    public function ajout(){

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit"])) {

            /**********************************JOUR 1***********************************/
            $jour1 = $_POST['jour1'];
            $heure1= $_POST['heure1'];
            $heure2= $_POST['heure2'];
            $heure3= $_POST['heure3'];
            $classe = $_POST['nomC'];

            //chercher id du module de la premiere heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure1]); 
            $module = $stmt->fetch();
                
            $idM1 = $module["id"];

            //chercher id du module de la 2 heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure2]); 
            $module = $stmt->fetch();
                
            $idM2 = $module["id"];
            
            //chercher id du module de la 3 heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure3]); 
            $module = $stmt->fetch();
                
            $idM3 = $module["id"];

            //chercher id de la classe
            $stmt = $conn->prepare("SELECT id FROM classe WHERE nomc=?");
            $stmt->execute([$classe]); 
            $c = $stmt->fetch();
                
            $idC = $c["id"];

            //inserer la première journée
            $sql = "INSERT INTO edt (jour,heure1,heure2,heure3,idClasse) VALUES (?,?,?,?,?)";
            $conn->prepare($sql)->execute([$jour1,$idM1,$idM2,$idM3,$idC]);

            /**********************************JOUR 2***********************************/
            $jour2 = $_POST['jour2'];
            $heure12= $_POST['heure12'];
            $heure22= $_POST['heure22'];
            $heure32= $_POST['heure32'];

            //chercher id du module de la premiere heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure12]); 
            $module = $stmt->fetch();
                
            $idM1 = $module["id"];

            //chercher id du module de la 2 heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure22]); 
            $module = $stmt->fetch();
                
            $idM2 = $module["id"];
            
            //chercher id du module de la 3 heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure32]); 
            $module = $stmt->fetch();
                
            $idM3 = $module["id"];

            //inserer la 2 journée
            $sql = "INSERT INTO edt (jour,heure1,heure2,heure3,idClasse) VALUES (?,?,?,?,?)";
            $conn->prepare($sql)->execute([$jour2,$idM1,$idM2,$idM3,$idC]);

            /**********************************JOUR 3***********************************/
            $jour3 = $_POST['jour3'];
            $heure13= $_POST['heure13'];
            $heure23= $_POST['heure23'];
            $heure33= $_POST['heure33'];

            //chercher id du module de la premiere heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure13]); 
            $module = $stmt->fetch();
                
            $idM1 = $module["id"];

            //chercher id du module de la 2 heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure23]); 
            $module = $stmt->fetch();
                
            $idM2 = $module["id"];
            
            //chercher id du module de la 3 heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure33]); 
            $module = $stmt->fetch();
                
            $idM3 = $module["id"];

            //inserer la 3 journée
            $sql = "INSERT INTO edt (jour,heure1,heure2,heure3,idClasse) VALUES (?,?,?,?,?)";
            $conn->prepare($sql)->execute([$jour3,$idM1,$idM2,$idM3,$idC]);

            /**********************************JOUR 4***********************************/
            $jour4 = $_POST['jour4'];
            $heure14= $_POST['heure14'];
            $heure24= $_POST['heure24'];
            $heure34= $_POST['heure34'];

            //chercher id du module de la premiere heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure14]); 
            $module = $stmt->fetch();
                
            $idM1 = $module["id"];

            //chercher id du module de la 2 heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure24]); 
            $module = $stmt->fetch();
                
            $idM2 = $module["id"];
            
            //chercher id du module de la 3 heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure34]); 
            $module = $stmt->fetch();
                
            $idM3 = $module["id"];

            //inserer la 4 journée
            $sql = "INSERT INTO edt (jour,heure1,heure2,heure3,idClasse) VALUES (?,?,?,?,?)";
            $conn->prepare($sql)->execute([$jour4,$idM1,$idM2,$idM3,$idC]);

            /**********************************JOUR 5***********************************/
            $jour5 = $_POST['jour5'];
            $heure15= $_POST['heure15'];
            $heure25= $_POST['heure25'];
            $heure35= $_POST['heure35'];

            //chercher id du module de la premiere heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure15]); 
            $module = $stmt->fetch();
                
            $idM1 = $module["id"];

            //chercher id du module de la 2 heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure25]); 
            $module = $stmt->fetch();
                
            $idM2 = $module["id"];
            
            //chercher id du module de la 3 heure
            $stmt = $conn->prepare("SELECT id FROM module WHERE nom=?");
            $stmt->execute([$heure35]); 
            $module = $stmt->fetch();
                
            $idM3 = $module["id"];

            //inserer la 5 journée
            $sql = "INSERT INTO edt (jour,heure1,heure2,heure3,idClasse) VALUES (?,?,?,?,?)";
            $conn->prepare($sql)->execute([$jour5,$idM1,$idM2,$idM3,$idC]);

        }
            
        return true;

    }

    public function supp() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit2"])) {
            $classe = $_POST['nomC2'];

            //chercher id de la classe
            $stmt = $conn->prepare("SELECT id FROM classe WHERE nomc=?");
            $stmt->execute([$classe]); 
            $c = $stmt->fetch();
                
            $idC = $c["id"];

            $sql = "DELETE FROM edt WHERE idClasse=?";
            $conn->prepare($sql)->execute([$idC]);
        }
    }

    public function modifier() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit3"])) {

            $id = $_POST['idE'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $dateN = $_POST['dateN'];
            $adresse = $_POST['adresse'];
            $num = $_POST['phoneN'];
            $num2 = $_POST['phoneN2'];
            $num3 = $_POST['phoneN3'];
            $year = $_POST['year'];
            $email = $_POST['email'];
            $pass = $_POST['psw'];
            $cycle = $_POST['cycle'];
            $nomClass = $_POST['nomClass'];

            if (!empty($num)) {
                $sql = "UPDATE eleve SET teleph1=? WHERE id=?";
                $conn->prepare($sql)->execute([$num, $id]);
            }
            if (!empty($nom)) {
                $sql = "UPDATE eleve SET nom=? WHERE id=?";
                $conn->prepare($sql)->execute([$nom, $id]);
            }
            if (!empty($prenom)) {
                $sql = "UPDATE eleve  SET prenom=? WHERE id=?";
                $conn->prepare($sql)->execute([$prenom, $id]);
            }
            if (!empty($dateN)) {
                $sql = "UPDATE eleve SET dateNaissance=? WHERE id=?";
                $conn->prepare($sql)->execute([$dateN, $id]);
            }
            if (!empty($adresse)) {
                $sql = "UPDATE eleve  SET adresse=? WHERE id=?";
                $conn->prepare($sql)->execute([$adresse, $id]);
            }
            if (!empty($num2)) {
                $sql = "UPDATE eleve  SET teleph2=? WHERE id=?";
                $conn->prepare($sql)->execute([$num2, $id]);
            }
            if (!empty($num3)) {
                $sql = "UPDATE eleve  SET teleph3=? WHERE id=?";
                $conn->prepare($sql)->execute([$num3, $id]);
            }
            if (!empty($year)) {
                $sql = "UPDATE eleve SET annee=? WHERE id=?";
                $conn->prepare($sql)->execute([$year, $id]);
            }
            if (!empty($nomClass)) {
                $sql= "SELECT id FROM classe WHERE nomc=?";
                $query = $conn->prepare($sql);
                $query->execute(array($nomClass));
                $row=$query->fetch();
                $sql = "UPDATE eleve SET annee=? WHERE id=?";
                $conn->prepare($sql)->execute([$row['id'], $id]);
            }
            if (!empty($cycle)) {
                $sql = "UPDATE eleve SET annee=? WHERE id=?";
                $conn->prepare($sql)->execute([$cycle, $id]);
            }

            if (!empty($email)) {
                $sql = "UPDATE users SET email=? WHERE idEleve=?";
                $conn->prepare($sql)->execute([$email, $id]);
            }

            if (!empty($pass)) {
                $sql = "UPDATE users SET pass=? WHERE idEleve=?";
                $conn->prepare($sql)->execute([$pass, $id]);
            }

            return "true";

        }
    }
    

}
?>