<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/restaurationModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/restaurationView.php');

class ControllerRestauration {
    
    public function ajoutMenu() {
        $rModel = new restaurationModel();
        $rslt = $rModel->ajoutMenu();

        if ($rslt =='true') {

            header('Location: ControllerRestauration.php');
        }
        

    }

    public function supp() {
        $rModel = new restaurationModel();
        $rslt = $rModel->supp();

        if ($rslt =='true') {

        }
    }

    public function afficherRestauration() {

        $restoView = new restaurationView();
        $restoView->afficherRestaurationPage();
    }
}

$control = new ControllerRestauration();
$control->afficherRestauration();

?>