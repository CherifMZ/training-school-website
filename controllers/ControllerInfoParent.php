<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/infoParentModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/infoParentView.php');

class ControllerInfoParent {

    public function getInfo() {

        $infoModel = new infoParentModel();
        $rslt = $infoModel->getInfo();
        
        return $rslt;
    }

    public function infoFils() {

        $infoModel = new infoParentModel();
        $rslt = $infoModel->infoFils();
        
        return $rslt;
    }

    public function noteEnfant() {

        $infoModel = new infoParentModel();
        $rslt = $infoModel->noteEnfant();
        
        return $rslt;
    }

    public function activities() {
        $infoModel = new infoParentModel();
        $rslt = $infoModel->activities();
        
        return $rslt;
    }

    public function getEDT() {

        $infoModel = new infoParentModel();
        $rslt = $infoModel->getEDT();
        
        return $rslt;
    }

    public function getJour($idC) {

        $infoModel = new infoParentModel();
        $rslt = $infoModel->getJour($idC);
        
        return $rslt;
    }

    public function getNom($heure) {

        $infoModel = new infoParentModel();
        $rslt = $infoModel->getNom($heure);
        
        return $rslt;
    }

    public function afficher() {
        $rView = new infoParentView();
        $rView->afficherPage();
    }

    public function getClass($idC) {

        $infoModel = new infoParentModel();
        $rslt = $infoModel->getClass($idC);
        
        return $rslt;
    }
}

$controller = new ControllerInfoParent();
$controller->afficher();
