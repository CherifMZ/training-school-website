<?php

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/loginController.php');

class loginModel {

    private $db="mysql:dbname=tdw;hostname=127.0.0.1;";
    private $busername = "root";
    private $bpassword = "";

    private function connexion($db,$busername,$bpassword) {
        session_start();

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

    public function login() {

        $conn=$this->connexion($this->db,$this->busername,$this->bpassword);
        if (isset($_POST["submit"])) {

            $user = $_POST['email'];
            $pass = $_POST['psw']; //le hacher
            
            $sql = "SELECT email, pass, idEns, idEleve, idParent, idAdmin, idType FROM users WHERE email=? AND 
              pass=? ";
            $query = $conn->prepare($sql);
            $query->execute(array($user,$pass));

            
            if($query->rowCount() >= 1) {
                $quer = $query->fetch();

                $_SESSION['idtype'] = $quer["idType"];
                $_SESSION['idens'] = $quer["idEns"];
                $_SESSION['ideleve'] = $quer["idEleve"];
                $_SESSION['idadmin'] = $quer["idAdmin"];
                $_SESSION['idparent'] = $quer["idParent"];
                
              
                return true;
                
              } else {
                  echo "Email ou mot de passe sont incorrectes";
                }  
                
        } 
    }
}
?>