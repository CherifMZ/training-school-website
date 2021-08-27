<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/restoInfoModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/restoInfoView.php');

class ControllerRestoInfo {
    
    public function getMenu() { //deuxieme zone horizontale
        $mModel = new restoInfoModel();
        $rslt = $mModel->getMenu();

        return $rslt;
    }

    public function resto() {

        $aView = new restoInfoView();
        $aView->afficherPage();
    }
}

$control = new ControllerRestoInfo();
$control->resto();

?>