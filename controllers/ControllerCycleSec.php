<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/cycleSecModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/cycleSecView.php');

class ControllerCycleSec {
    
    public function getArticle() { //deuxieme zone horizontale
        $pModel = new cycleSecModel();
        $rslt = $pModel->getArticle();

        return $rslt;

    }

    public function afficherSec() {

        $pView = new cycleSecView();
        $pView->afficherSecPage();
    }
}

$control = new ControllerCycleSec();
$control->afficherSec();

?>