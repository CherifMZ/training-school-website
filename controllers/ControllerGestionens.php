<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/GestionEnsModel.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/gestionEnsView.php');

class ControllerGestionens {
    
    public function hT() { //heure de travail
        $ensModel = new GestionEnsModel();
        $ensModel->heurT();
    }

    public function hR() { //heure de reception
        $ensModel = new GestionEnsModel();
        $ensModel->heurR();
    }

    public function cE() { //affecter un enseignant a une classe
        $ensModel = new GestionEnsModel();
        $ensModel->classN();
    }

    public function supprimerC() {
        //supprimer un enseignant d'une classe et modification
        $aModel = new GestionEnsModel();
        $aModel->supprimerC();
    }

    public function heurTM() {
        //supprimer un enseignant d'une classe et modification
        $aModel = new GestionEnsModel();
        $aModel->heurTM();
    }

    public function heurTS() {
        //supprimer un enseignant d'une classe et modification
        $aModel = new GestionEnsModel();
        $aModel->heurTS();
    }

    public function heurRM() {
        //supprimer un enseignant d'une classe et modification
        $aModel = new GestionEnsModel();
        $aModel->heurRM();
    }

    public function heurRS() {
        //supprimer un enseignant d'une classe et modification
        $aModel = new GestionEnsModel();
        $aModel->heurRS();
    }

    public function afficherEns() {
        $ensView = new gestionEnsView();
        $ensView->afficherEnsPage();
    }
}

$control = new ControllerGestionens();
$control->afficherEns();

?>