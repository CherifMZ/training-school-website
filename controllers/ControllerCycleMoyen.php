<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/cycleMoyenModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/cycleMoyenView.php');

class ControllerCycleMoyen {
    
    public function getArticle() { //deuxieme zone horizontale
        $pModel = new cycleMoyenModel();
        $rslt = $pModel->getArticle();

        return $rslt;

    }

    public function afficherMoyen () {

        $mView = new cycleMoyenView();
        $mView->afficherMoyenPage();
    }
}

$control = new ControllerCycleMoyen ();
$control->afficherMoyen ();

?>