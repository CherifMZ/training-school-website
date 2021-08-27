<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/informationPratiqueM.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/infoPratiqueModel.php');

class ControllerInfoPratiqueM {

    public function getInfo($id) {

        $aView = new infoPratiqueModel();
        $rslt=$aView->getInfo($id);

        return $rslt;
    }
    
    public function afficher() {

        $aView = new informationPratiqueM();
        $aView->afficherPage();
    }
}

$control = new ControllerInfoPratiqueM();
$control->afficher();

?>