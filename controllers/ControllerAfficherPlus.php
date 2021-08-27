<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/afficherPlusModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/afficherPlusView.php');

class ControllerAfficherPlus {
    
    public function getArticle($id) { //deuxieme zone horizontale
        $aModel = new afficherPlusModel();
        $rslt = $aModel->getArticle($id);

        return $rslt;

    }

    public function afficherPlus () {

        $aView = new afficherPlusView();
        $aView->afficherPlusPage();
    }
}

$control = new ControllerAfficherPlus();
$control->afficherPlus();

?>