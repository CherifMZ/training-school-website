<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/informationPratiqueP.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/infoPratiquepModel.php');

class ControllerInfoPratiqueP {

    public function getInfo($id) {

        $aView = new infoPratiquepModel();
        $rslt=$aView->getInfo($id);

        return $rslt;
    }
    
    public function afficher() {

        $aView = new informationPratiqueP();
        $aView->afficherPage();
    }
}

$control = new ControllerInfoPratiqueP();
$control->afficher();

?>