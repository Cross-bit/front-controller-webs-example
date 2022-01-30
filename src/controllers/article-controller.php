<?php
require_once(__DIR__.'/../models/articles-model.php');

class ArticleController  {
    private $articlesModel;

    public function __construct($articlesModel) {
        $this->articlesModel = $articlesModel;
    }

    public function GetAllArticles() {
        $data = $this->articlesModel->GetAllArticles();
    }

    public function GetSingleArticle($id) {
                
    }


    public function RemoveArticle($id) {

    }

}
