<?php

require_once(__DIR__.'/../models/articles-model.php');

class ArticleEditController
{
    private $articlesModel;

    public function __construct($articlesModel) {
        $this->articlesModel = $articlesModel;
    }

    public function AddArticle() {
        
    }

    public function RemoveArticle() {

    }

}