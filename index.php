<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/controllers/ControllerAccueil.php');

$control = new ControllerAccueil ();
$control->afficherAccueil();

?>