<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/espaceEnsModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/espaceEnsView.php');

class ControllerEspaceEns {
    
    public function getArticle() { 
        $pModel = new espaceEnsModel();
        $rslt = $pModel->Article();

        return $rslt;

    }

    public function afficher() {

        $pView = new espaceEnsView();
        $pView->afficherPage();
    }
}

$control = new ControllerEspaceEns();
$control->afficher();

?>