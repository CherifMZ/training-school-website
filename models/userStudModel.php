<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerUserStud.php');

class userStudModel {

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

    public function inscr(){

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit"])) {

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

            //get idClass from la table Classe
            $sql6= "SELECT id FROM classe WHERE nomc=?";
            $query6 = $conn->prepare($sql6);
            $query6->execute(array($nomClass));
            $row6=$query6->fetch();

            //inserer les information de l'élève dans la table eleve
            $sql = "INSERT INTO eleve (nom,prenom,dateNaissance,teleph1,teleph2,teleph3,annee,adresse,idClasse,idType) 
            VALUES (?,?,?,?,?,?,?,?,?,?)";
            $conn->prepare($sql)->execute([$nom,$prenom,$dateN,$num,$num2,$num3,$year,$adresse,$row6['id'],$cycle]);

            //get last id from la table eleve
            $sql3= "SELECT max(id) as id FROM eleve";
            $query=$conn->prepare($sql3);
            $query->execute();
            $row=$query->fetch();

            //inserer dans la table user
            $sql2 = "INSERT INTO users (email,pass,idEleve,idType) VALUES (?,?,?,?)";
            $conn->prepare($sql2)->execute([$email,$pass,$row['id'],$cycle]);

            //get last id from la table users
            $sql4= "SELECT max(id) as id FROM users";
            $query2=$conn->prepare($sql4);
            $query2->execute();
            $row2=$query2->fetch();

            //iupdate la table eleve avec son uderid
            $sql = "UPDATE eleve SET idUser=? WHERE nom=?";
            $conn->prepare($sql)->execute([$row2['id'], $nom]);

            echo "<script type='text/javascript'>window.top.location='ControllerUserStud.php';</script>"; exit;
        }
    }

    public function supp() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit2"])) {
        
            $nom = $_POST['nom'];

            //selection de idUser de la table eleve
            $sql= "SELECT idUser FROM eleve where id = ?";
            $query=$conn->prepare($sql);
            $query->execute(array($nom));
            $row=$query->fetch();

            //mettre userId de cette meme ligne en null
            $sql = "UPDATE eleve SET idUser=? WHERE id=?";
            $conn->prepare($sql)->execute([null,$nom]);

            //mettre userEleve de cette meme ligne en null
            $sql = "UPDATE user SET idEleve=? WHERE id=?";
            $conn->prepare($sql)->execute([null,$row['idUser']]);

            $sql = "DELETE FROM users WHERE idEleve =?";
            $query = $conn->prepare($sql);
            $query->execute(array($nom));
        
            $sql = "DELETE FROM eleve WHERE id =?";
            $query = $conn->prepare($sql);
            $query->execute(array($nom));

            echo "<script type='text/javascript'>window.top.location='ControllerUserStud.php';</script>"; exit;
        }
    }

    public function liste() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        $sql = $conn->prepare("SELECT id, nom, prenom FROM eleve");
        $sql->execute();

        return $sql;
        
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

            echo "<script type='text/javascript'>window.top.location='ControllerUserStud.php';</script>"; exit;
        }
    }
    
}
?>