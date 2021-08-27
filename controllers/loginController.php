<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/loginView.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/loginModel.php');

class loginController {
    
    public function login() {
        $lModel = new loginModel();
        $row=$lModel->login();

        if ($row == true) {
            if (isset($_SESSION['idtype'])) {
              
                if ($_SESSION['idtype']=='6') {
                    header('Location: ../views/adminPageView.php');
                  }
                  else if ($_SESSION['idtype']=='2') {
                    header('Location: ../controllers/ControllerInfoEleve.php'); // a optimiser
                  }
                  else if ($_SESSION['idtype']=='3') {
                    header('Location: ../controllers/ControllerInfoEleve.php');
                  }
                  else if ($_SESSION['idtype']=='4') {
                    header('Location: ../controllers/ControllerInfoEleve.php');
                  } 
                  else if ($_SESSION['idtype']=='5') {
                    header('Location: ../controllers/ControllerInfoParent.php');
                  }
                  else if ($_SESSION['idtype']=='1') {
                    header('Location: ../controllers/ControllerInfoEns.php');
                  }
            }
        }

    }

    public function afficherLogin() {
        $loginView = new loginView();
        $loginView->afficherLoginPage();
    }
}

$control = new loginController();
$control->afficherLogin();

?>