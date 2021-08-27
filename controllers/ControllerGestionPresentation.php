<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/gestionPresentationModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/gestionPresentationView.php');

class ControllerGestionPresentation {
    
    public function ajouter() { //deuxieme zone horizontale
        $pModel = new gestionPresentationModel();
        $pModel->ajouter();
    }

    public function supp() {

        $pModel = new gestionPresentationModel();
        $pModel->supp();
    }

    public function modifier() {

        $pModel = new gestionPresentationModel();
        $pModel->modifier();
    }

    public function getList() {

        $pModel = new gestionPresentationModel();
        $rslt = $pModel->getList();

        return $rslt;

    }

    public function afficher() {

        $pView = new gestionPresentationView();
        $pView->afficher();
    }
}

$control = new ControllerGestionPresentation();
$control->afficher();

?>