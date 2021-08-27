<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerUserParent.php');

class userParentModel {

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

    public function inscr() 
    {

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit"])) {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $dateN = $_POST['dateN'];
            $adresse = $_POST['adresse'];
            $num = $_POST['phoneN'];
            $email = $_POST['email'];
            $pass = $_POST['psw'];

            //inserer dans la table parent
            $sql = "INSERT INTO parent (nom,prenom,teleph1,dateNaissance,adresse,idType) 
            VALUES (?,?,?,?,?,?)";
            $conn->prepare($sql)->execute([$nom,$prenom,$num,$dateN,$adresse,"5"]);

            //get last id from la table parent
            $sql3= "SELECT max(id) as id FROM parent";
            $query=$conn->prepare($sql3);
            $query->execute();
            $row=$query->fetch();

            //inserer dans la table user
            $sql2 = "INSERT INTO users (email,pass,idParent,idType) VALUES (?,?,?,?)";
            $conn->prepare($sql2)->execute([$email,$pass,$row['id'],"5"]);

            //get last id from la table users
            $sql4= "SELECT max(id) as id FROM users";
            $query2=$conn->prepare($sql4);
            $query2->execute();
            $row2=$query2->fetch();

            //inserer dans la table parent
            $sql5 = "INSERT INTO parent (idUser) VALUES (?) WHERE nom = ".$nom."";
            $conn->prepare($sql5)->execute(array($row2['id']));

            //rajouter id de son enfant dans la table parent

            return true;

        }
    }

    public function supp() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit2"])) {
        
            $nom = $_POST['nom2']; //c'est le id

            //selection de idUser de la table parent
            $sql= "SELECT idUser FROM parent where id = ?";
            $query=$conn->prepare($sql);
            $query->execute(array($nom));
            $row=$query->fetch();

            //mettre userId de cette meme ligne en null
            $sql = "UPDATE parent SET idUser=? WHERE id=?";
            $conn->prepare($sql)->execute([null,$nom]);

            //mettre userId de cette meme ligne en null
            $sql = "UPDATE user SET idParent=? WHERE id=?";
            $conn->prepare($sql)->execute([null,$row['idUser']]);

            $sql = "DELETE FROM users WHERE idParent =?";
            $query = $conn->prepare($sql);
            $query->execute(array($nom));
        
            $sql = "DELETE FROM parent WHERE id =?";
            $query = $conn->prepare($sql);
            $query->execute(array($nom));

            return true;
        }
    }

    public function modifier() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit3"])) {

            $id = $_POST['idE3'];
            $nom = $_POST['nom3'];
            $prenom = $_POST['prenom3'];
            $dateN = $_POST['dateN3'];
            $adresse = $_POST['adresse3'];
            $num = $_POST['phoneN3'];
            $num2 = $_POST['phoneN23'];
            $num3 = $_POST['phoneN33'];
            $email = $_POST['email3'];
            $pass = $_POST['psw3'];

            if (!empty($num)) {
                $sql = "UPDATE parent SET teleph1=? WHERE id=?";
                $conn->prepare($sql)->execute([$num, $id]);
            }
            if (!empty($nom)) {
                $sql = "UPDATE parent SET nom=? WHERE id=?";
                $conn->prepare($sql)->execute([$nom, $id]);
            }
            if (!empty($prenom)) {
                $sql = "UPDATE parent SET prenom=? WHERE id=?";
                $conn->prepare($sql)->execute([$prenom, $id]);
            }
            if (!empty($dateN)) {
                $sql = "UPDATE parent SET dateNaissance=? WHERE id=?";
                $conn->prepare($sql)->execute([$dateN, $id]);
            }
            if (!empty($adresse)) {
                $sql = "UPDATE parent SET adresse=? WHERE id=?";
                $conn->prepare($sql)->execute([$adresse, $id]);
            }
            if (!empty($num2)) {
                $sql = "UPDATE parent SET teleph2=? WHERE id=?";
                $conn->prepare($sql)->execute([$num2, $id]);
            }
            if (!empty($num3)) {
                $sql = "UPDATE parent SET teleph3=? WHERE id=?";
                $conn->prepare($sql)->execute([$num3, $id]);
            }

            if (!empty($email)) {
                $sql = "UPDATE users SET email=? WHERE idParent=?";
                $conn->prepare($sql)->execute([$email, $id]);
            }

            if (!empty($pass)) {
                $sql = "UPDATE users SET pass=? WHERE idParent=?";
                $conn->prepare($sql)->execute([$pass, $id]);
            }

            return "true";

        }
    }
}