<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/affichageEdtModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/affichageEdtView.php');

class ControllerAffichageEdt {
    
    public function getedt($id) { //deuxieme zone horizontale
        $mModel = new affichageEdtModel();
        $rslt = $mModel->getedt($id);

        return $rslt;

    }

    public function toS($string) {
        $mModel = new affichageEdtModel();
        $rslt = $mModel->toS($string);

        return $rslt;
    }

    public function edt() {

        $aView = new affichageEdtView();
        $aView->afficherPage();
    }
}

$control = new ControllerAffichageEdt();
$control->edt();

?>