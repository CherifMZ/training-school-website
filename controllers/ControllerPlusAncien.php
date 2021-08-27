<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/PlusAncienModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/PlusAncien.php');

class ControllerPlusAncien {
    
    public function getArticle() { 

        $presentModel = new PlusAncienModel();
        $rslt = $presentModel->getArticle();

        return $rslt;
    }

    public function afficher() {
        $pView = new PlusAncien();
        $pView->afficherPage();
    }
}

$control = new ControllerPlusAncien();
$control->afficher();

?>