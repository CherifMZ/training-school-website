<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/informationPratiqueS.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/infoPratiqueSModel.php');

class ControllerInfoPratiqueS {

    public function getInfo($id) {

        $aView = new infoPratiqueSModel();
        $rslt=$aView->getInfo($id);

        return $rslt;
    }
    
    public function afficher() {

        $aView = new informationPratiqueS();
        $aView->afficherPage();
    }
}

$control = new ControllerInfoPratiqueS();
$control->afficher();

?>