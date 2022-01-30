<?php

require_once(__DIR__.'/../models/articles-model.php');
require_once(__DIR__.'/../PageTemplate/Template.php');
require_once(__DIR__.'/../PageTemplate/PageData.php');

class ArticlesController {

    private $articlesModel;

    public function __construct($articlesModel) {
        $this->articlesModel = $articlesModel;
    }


    public function GetAllArticles() {
        $template = new Template('articles', 'archive');

        $allArticles = $this->articlesModel->GetAllArticles();

        $pageData = new PageData(
            'All articles',
            $allArticles
        );

        $this->articlesModel->GetLastInsertedArticle();

        $template->RenderPage($pageData);
    }

    public function ShowArticle($id) {
        $template = new Template('articles', 'single');

        $articleData = $this->articlesModel->GetArticleById($id);
        
        if (empty($articleData)) {
            http_response_code(404);
            return;
        }

        $pageData = new PageData(
            $articleData['name'],
            $articleData
        );

        $template->RenderPage($pageData);
    }

    public function EditArticle($id) {
        $template = new Template('articles', 'edit');

        $articleData = $this->articlesModel->GetArticleById($id);
        
        if (empty($articleData)) {
            http_response_code(404);
            return;
        }

        $pageData = new PageData(
            'Edit - '.$articleData['name'],
            $articleData
        );

        $template->RenderPage($pageData);
    }

    public function SaveEditedArticle($id) {

        if (!empty($_POST) && isset($_POST['title']) && $_POST['title'] != '') { // empty title should not happen

            $articleContent = $_POST['content'] ?? '';
            
            // allows to store only some tags
            //$articleContent = strip_tags($articleContent, ['<br>', '<p>', '<hr>', '<img>', '<b>', '<img>']);

            $this->articlesModel->UpdateArticle($id, $_POST['title'], $articleContent);
        }

        Template::Redirect(BASE_URL.'/articles');
    }

    public function CreateNewArticle() {
        // todo: dorozmyslet ochranu a ty 404
        if (!empty($_POST) && isset($_POST['title']) && $_POST['title'] != '') {

            $articleTitle = $_POST['title'];

            $insertionStatus = $this->articlesModel->InsertNewArticle($articleTitle, '');

            if ($insertionStatus != false) {
                // get its new id
                $lastArticle = $this->articlesModel->GetLastInsertedArticle();
                
                if (empty($lastArticle)){    
                    http_response_code(404);
                    return;
                }

                $redirectUrl = BASE_URL.'/article-edit/'.$lastArticle['id'];

                Template::Redirect($redirectUrl);
            }
            else {
                http_response_code(404);
                return;
            }

        }
        else {
            http_response_code(404);
            return;
        }

    }

    public function DeleteArticle() {
        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {    
            $articleToDelete = $_GET['id'];

            if(!is_numeric($articleToDelete)) { // only number!
                return;
            }

            $this->articlesModel->DeleteArticle($articleToDelete);
            echo "response: Article with id $articleToDelete was deleted.";
        }
    }


    public function SaveNewArticle($id){

    }
}