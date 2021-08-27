<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/espaceEleveModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/espaceEleveView.php');

class espaceEleveController {
    
    public function getArticle() {
        $aModel = new espaceEleveModel();
        $rslt = $aModel->getArticle();

        return $rslt;

    }

    public function afficherView () {

        $aView = new espaceEleveView();
        $aView->afficherPage();
    }
}

$control = new espaceEleveController();
$control->afficherView();

?>