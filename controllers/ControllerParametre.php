<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/parametreView.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/parametreModel.php');

class ControllerParametre {
    
    public function ajouter() {

        $aModel = new parametreModel();
        $aModel->ajouter();
    }

    public function getSrc() {

        $aModel = new parametreModel();
        $rslt=$aModel->getSrc();
        
        return $rslt;
    }

    public function supp() {

        $aModel = new parametreModel();
        $aModel->supp();
    }


    public function modifier() {
        $uModel = new parametreModel();
        $uModel->modifier();
    }

    public function afficherPage() {
        $articleView = new parametreView();
        $articleView->afficherPage();
    }
}

$control = new ControllerParametre();
$control->afficherPage();

?>