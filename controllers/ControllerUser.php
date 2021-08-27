<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/userView.php');

class ControllerUser {

    public function afficherUser() {

        $uView = new userView();
        $uView->afficherUserPage();
    }
}

$control = new ControllerUser();
$control->afficherUser();

?>