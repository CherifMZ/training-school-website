<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/userEnsModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/userEnsView.php');

class ControllerUserEns {
    
    public function ajoutEns() {
        $uModel = new userEnsModel();
        $rslt = $uModel->ajoutEns();

        if ($rslt =='true') {

        }

    }

    public function suppEns() {
        $uModel = new userEnsModel();
        $rslt = $uModel->suppEns();

        if ($rslt =='true') {

        }

    }

    public function modif() {
        $uModel = new userEnsModel();
        $rslt = $uModel->modifier();

        if ($rslt =='true') {
            
        }

    }

    public function afficherUserEns() {

        $restoView = new userEnsView();
        $restoView->afficherUserPage();
    }
}

$control = new ControllerUserEns();
$control->afficherUserEns();

?>