<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/presentationModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/presentationView.php');

class ControllerPresentation {
    
    public function present() { 
        $presentModel = new presentationModel();
        $rslt = $presentModel->presenta();
        
        if ($rslt =='true') {

            header('Location: ControllerPresentation.php');
        }

        return $rslt;
    }

    public function afficherPresent() {
        $pView = new presentationView();
        $pView->afficherPresentPage();
    }
}

$control = new ControllerPresentation();
$control->afficherPresent();

?>