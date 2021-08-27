<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerUserEns.php');

class userEnsModel {

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

    public function ajoutEns() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit"])) {

            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $num = $_POST['phoneN'];
            $email = $_POST['email'];
            $pass = $_POST['psw'];
          
            $sql = "INSERT INTO enseignant (nom,prenom,teleph1,adresse,idType) 
            VALUES (?,?,?,?,?)";
            $conn->prepare($sql)->execute([$nom,$prenom,$num,$adresse,"1"]);

            //get last id from la table enseignant
            $sql3= "SELECT max(id) as id FROM enseignant";
            $query=$conn->prepare($sql3);
            $query->execute();
            $row=$query->fetch();

            //inserer dans la table user
            $sql2 = "INSERT INTO users (email,pass,idEns,idType) VALUES (?,?,?,?)";
            $conn->prepare($sql2)->execute([$email,$pass,$row['id'],"1"]);

            //get last id from la table users
            $sql4= "SELECT max(id) as id FROM users";
            $query2=$conn->prepare($sql4);
            $query2->execute();
            $row2=$query2->fetch();

            //inserer dans la table user
            $sql5 = "INSERT INTO enseignant (idUser) VALUES (?)";
            $conn->prepare($sql5)->execute(array($row2['id']));

            return true;
            
        }
    }

    public function suppEns() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit2"])) {
        
            $nom = $_POST['nom'];

            $sql= "SELECT id FROM enseignant where nom = ?";
            $query=$conn->prepare($sql);
            $query->execute(array($nom));
            $row=$query->fetch();

            $sql = "DELETE FROM users WHERE idEns =?";
            $query = $conn->prepare($sql);
            $query->execute(array($row['id']));
        
            $sql = "DELETE FROM enseignant WHERE nom =?";
            $query = $conn->prepare($sql);
            $query->execute(array($nom));

            return true;
        }
    }

    public function modifier() {
        
        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);

        if (isset($_POST["submit3"])) {

            $id = $_POST['idE'];
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $adresse = $_POST['adresse'];
            $num = $_POST['phoneN'];
            $num2 = $_POST['phoneN2'];
            $num3 = $_POST['phoneN3'];
            $email = $_POST['email'];
            $pass = $_POST['psw'];
            $nomClass = $_POST['nomClass'];

            if (!empty($num)) {
                $sql = "UPDATE enseignant SET teleph1=? WHERE id=?";
                $conn->prepare($sql)->execute([$num, $id]);
            }
            if (!empty($nom)) {
                $sql = "UPDATE enseignant SET nom=? WHERE id=?";
                $conn->prepare($sql)->execute([$nom, $id]);
            }
            if (!empty($prenom)) {
                $sql = "UPDATE enseignant SET prenom=? WHERE id=?";
                $conn->prepare($sql)->execute([$prenom, $id]);
            }
            if (!empty($adresse)) {
                $sql = "UPDATE enseignant SET adresse=? WHERE id=?";
                $conn->prepare($sql)->execute([$adresse, $id]);
            }
            if (!empty($num2)) {
                $sql = "UPDATE enseignant SET teleph2=? WHERE id=?";
                $conn->prepare($sql)->execute([$num2, $id]);
            }
            if (!empty($num3)) {
                $sql = "UPDATE enseignant SET teleph3=? WHERE id=?";
                $conn->prepare($sql)->execute([$num3, $id]);
            }
            if (!empty($nomClass)) {

                $sql= "SELECT id FROM classe WHERE nomc=?";
                $query = $conn->prepare($sql);
                $query->execute(array($nomClass));
                $row=$query->fetch();

                $sql = "UPDATE enseignant SET annee=? WHERE id=?";
                $conn->prepare($sql)->execute([$row['id'], $id]);
            }

            if (!empty($email)) {
                $sql = "UPDATE users SET email=? WHERE idEns=?";
                $conn->prepare($sql)->execute([$email, $id]);
            }

            if (!empty($pass)) {
                $sql = "UPDATE users SET pass=? WHERE idEns=?";
                $conn->prepare($sql)->execute([$pass, $id]);
            }

            return "true";

        }
    }

}
?>