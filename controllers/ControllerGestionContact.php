<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/gestionContactModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/gestionContactView.php');

class ControllerGestionContact {
    
    public function ajoutC() {

        $cModel = new gestionContactModel();
        $cModel->ajoutContact();
    }

    public function modifC() {

        $cModel = new gestionContactModel();
        $cModel->modifierContact();
    }

    public function getSrc() {

        $aModel = new gestionContactModel();
        $rslt=$aModel->getSrc();
        
        return $rslt;
    }

    public function afficherC() {

        $restoView = new gestionContactView();
        $restoView->afficherContactPage();
    }
    

    public function supp() {
        $aModel = new gestionContactModel();
        $aModel->supp();
    }
}

$control = new ControllerGestionContact();
$control->afficherC();

?>