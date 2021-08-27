<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/infoEnsModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/infoEnsView.php');

class ControllerInfoEns{

    public function getInfo() {

        $infoModel = new infoEnsModel();
        $rslt = $infoModel->getInfo();
        
        return $rslt;
    }

    public function getNote() {

        $infoModel = new infoEnsModel();
        $rslt = $infoModel->getNote();
        
        return $rslt;
    }

    public function modif() {

        $infoModel = new infoEnsModel();
        $rslt = $infoModel->modif();

        if ($rslt =='true') {
           // header('location :  ControllerInfoEns.php');        
        }

    }

    public function ajout() {
        $infoModel = new infoEnsModel();
        $rslt = $infoModel->ajout();

        if ($rslt =='true') {
            //header('location :  ControllerInfoEns.php');
        }
    }

    public function supp() {
        $infoModel = new infoEnsModel();
        $rslt = $infoModel->supp();

        if ($rslt =='true') {
            //header('location :  ControllerInfoEns.php');
        }
    }

    public function afficher() {
        $rView = new infoEnsView();
        $rView->afficherPage();
    }

}

$controller = new ControllerInfoEns();
$controller->afficher();
