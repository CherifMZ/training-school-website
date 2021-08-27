<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/infoEleveModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/infoEleveView.php');

class ControllerInfoEleve {

    public function getInfo() {

        $infoModel = new infoEleveModel();
        $rslt = $infoModel->getInfo();
        
        return $rslt;
    }

    public function getExtraScolaire() {

        $infoModel = new infoEleveModel();
        $rslt = $infoModel->getExtraScolaire();
        
        return $rslt;
    }

    public function getNote() {

        $infoModel = new infoEleveModel();
        $rslt = $infoModel->getNote();
        
        return $rslt;
    }

    public function getEDT() {

        $infoModel = new infoEleveModel();
        $rslt = $infoModel->getEDT();
        
        return $rslt;
    }

    public function getNom($heure) {

        $infoModel = new infoEleveModel();
        $rslt = $infoModel->getNom($heure);
        
        return $rslt;
    }

    public function getJour() {
        
        $idC = $this->getEDT();
        $infoModel = new infoEleveModel();
        $rslt = $infoModel->getJour($idC);

        return $rslt;
    }

    public function afficher() {
        $rView = new infoEleveView();
        $rView->afficherPage();
    }
}

$controller = new ControllerInfoEleve();
$controller->afficher();