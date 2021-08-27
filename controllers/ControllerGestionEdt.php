<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/gestionEdtModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/gestionEdtView.php');

class ControllerGestionEdt {
    
    public function ajout() {
        $aModel = new gestionEdtModel();
        $rslt = $aModel->ajout();

        if ($rslt=='true'){

        }
    }

    public function supp() {
        $aModel = new gestionEdtModel();
        $rslt = $aModel->supp();

        if ($rslt=='true'){

        }
    }

    public function afficher() {
        $eView = new gestionEdtView();
        $eView->afficherPage();
    }
}

$control = new ControllerGestionEdt();
$control->afficher();

?>