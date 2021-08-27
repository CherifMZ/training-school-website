<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/espaceParentModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/espaceParentView.php');

class ControllerEspaceParent {
    
    public function getArticle() {
        $aModel = new espaceParentModel();
        $rslt = $aModel->getArticle();

        return $rslt;

    }

    public function afficherView () {

        $aView = new espaceParentView();
        $aView->afficherPage();
    }
}

$control = new ControllerEspaceParent();
$control->afficherView();

?>