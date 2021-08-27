<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/contactView.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/contactModel.php');

class contactController {
    public function getContact() {
        $cModel = new contactModel();
        $row=$cModel->getContacts();

        return $row;
    }

    public function afficherContact() {
        $contactView = new contactView();
        $contactView->afficherContactPage();
    }
}

$control = new contactController();
$control->afficherContact();

?>