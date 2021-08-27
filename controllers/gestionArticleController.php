<?php

$relativePath = $_SERVER['DOCUMENT_ROOT'];

require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/views/gestionArticleView.php');
require_once($relativePath.'/Latreche_Mohamed_Cherif_Zouaoui_SIL1/models/gestionArticleModel.php');

class gestionArticleController {
    
    public function ajouterArticle() {

        $aModel = new gestionArticleModel();
        $rslt = $aModel->ajoutAr();

        if ($rslt =='true') {
        }

    }

    public function supp() {

        $aModel = new gestionArticleModel();
        $rslt = $aModel->supp();

        if ($rslt =='true') {
        }

    }

    public function modif() {

        $aModel = new gestionArticleModel();
        $rslt = $aModel->modif();

        if ($rslt =='true') {
        }

    }

    public function getList() {

        $pModel = new gestionArticleModel();
        $rslt = $pModel->getList();

        return $rslt;

    }

    public function afficherArticle() {
        $articleView = new gestionArticleView();
        $articleView->afficherArticlePage();
    }
}

$control = new gestionArticleController();
$control->afficherArticle();

?>