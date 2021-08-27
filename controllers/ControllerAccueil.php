<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/accueilModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/accueilView.php');

class ControllerAccueil {
    
    public function getArticle() {
        $aModel = new accueilModel();
        $rslt = $aModel->getArticle();

        return $rslt;
    }

    public function getImage() {
        $aModel = new accueilModel();
        $rslt = $aModel->getImage();

        return $rslt;
    }

    public function afficherAccueil () {

        $aView = new accueilView();
        $aView->afficherAccueilPage();
    }
}

?>