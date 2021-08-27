<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/userStudModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/userStudView.php');

class ControllerUserStud {
    
    public function insc() { //heure de travail
        $registerModel = new userStudModel();
        $registerModel->inscr();
    }

    public function supp() {
        $uModel = new userStudModel();
        $uModel->supp();
    }

    public function liste() {
        $uModel = new userStudModel();
        $rslt = $uModel->liste();

        return $rslt;
    }

    public function modifier() {
        $uModel = new userStudModel();
        $uModel->modifier();
    }

    public function afficherRegist() {
        $rView = new userStudView();
        $rView->afficherRegisterPage();
    }
}

$control = new ControllerUserStud();
$control->afficherRegist();

?>