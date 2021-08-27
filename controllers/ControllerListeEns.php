<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/listeEnsModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/listeEnsView.php');

class ControllerListeEns {
    
    public function getListe($id) { //deuxieme zone horizontale
        $mModel = new listeEnsModel();
        $rslt = $mModel->getListe($id);

        return $rslt;

    }

    public function liste() {

        $aView = new listeEnsView();
        $aView->afficherPage();
    }
}

$control = new ControllerListeEns();
$control->liste();

?>