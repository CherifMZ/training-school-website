<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/articleIndexView.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/articleIndexModel.php');

class ControllerArticleIndex {
    
    public function ajouterArticle() {

        $aModel = new articleIndexModel();
        $rslt = $aModel->ajout();

        if ($rslt =='true') {
        }

    }

    public function supp() {

        $aModel = new articleIndexModel();
        $rslt = $aModel->supp();

        if ($rslt =='true') {
        }

    }

    public function modif() {

        $aModel = new articleIndexModel();
        $rslt = $aModel->modif();

        if ($rslt =='true') {
        }

    }

    public function getList() {

        $pModel = new articleIndexModel();
        $rslt = $pModel->getList();

        return $rslt;

    }

    public function afficherArticle() {
        $articleView = new articleIndexView();
        $articleView->afficherArticlePage();
    }
}

$control = new ControllerArticleIndex();
$control->afficherArticle();

?>