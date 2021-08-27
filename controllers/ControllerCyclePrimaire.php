<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/cyclePrimaireModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/cyclePrimaireView.php');

class ControllerCyclePrimaire {
    
    public function getArticle() { //deuxieme zone horizontale
        $pModel = new cyclePrimaireModel();
        $rslt = $pModel->getArticle();

        return $rslt;

    }

    public function afficherPrimaire() {

        $pView = new cyclePrimaireView();
        $pView->afficherPrimairePage();
    }
}

$control = new ControllerCyclePrimaire();
$control->afficherPrimaire();

?>