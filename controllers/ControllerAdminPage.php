<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/adminPageView.php');

class ControllerAdminPage {
    
    public function afficher() {

        $aView = new adminPageView();
        $aView->afficherPage();
    }
}

$control = new ControllerAdminPage();
$control->afficher();

?>