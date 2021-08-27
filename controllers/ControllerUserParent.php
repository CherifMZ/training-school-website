<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/userParentModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/userParentView.php');

class ControllerUserParent {
    
    public function insc() { //heure de travail
        $registerModel = new userParentModel();
        $rslt = $registerModel->inscr();
        
        if ($rslt =='true') {

            //echo "<script>alert(\"heures de travail ajoutées\")</script>";
            //header('Location: ControllerUserStud.php');
        }
        //header('Location: pageAccueil.php');

    }

    public function supp() {
        $uModel = new userParentModel();
        $rslt = $uModel->supp();

        if ($rslt =='true') {

            $relativePath = $_SERVER['DOCUMENT_ROOT'];
            header('Location: ControllerUserParent.php');
        }
        //header('Location: pageAccueil.php');

    }

    public function modifier() {
        $uModel = new userParentModel();
        $rslt = $uModel->modifier();

        if ($rslt =='true') {
        }
    }

    public function afficherRegist() {
        $rView = new userParentView();
        $rView->afficherRegisterPage();
    }
}

$control = new ControllerUserParent();
$control->afficherRegist();

?>