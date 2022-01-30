<?php

/*include(__DIR__."/header.php");

return;*/
require_once(__DIR__.'/src/models/articles-model.php');
require_once(__DIR__.'/src/controllers/articles-controller.php');
require_once(__DIR__.'/src/controllers/article-controller.php');
require_once(__DIR__.'/src/controllers/article-edit-controller.php');
require_once(__DIR__.'/config/config.php');

if (!isset($_GET['controller'])) {
    http_response_code(400);
    return;
}


$articlesModel = new ArticlesModel();

$controller = null;

$request = explode('/', trim($_GET['controller'], '/'));

$controllerName = $request[0];

switch ($request[0]){
    case 'articles':
            $controller = new ArticlesController($articlesModel);
            $method = $_GET['method'] ?? 'GetAllArticles';
            $controller->{$method}();
        break;
    case 'article':
        if(count($request) != 2) {
            http_response_code(404);
            return;
        }

        $controller = new ArticlesController($articlesModel);
       
        $method = $_GET['method'] ?? 'ShowArticle';
        $controller->{$method}($request[1]);

    break;
    case 'article-edit':

        if(count($request) != 2) {
            http_response_code(404);
            return;
        }

        $controller = new ArticlesController($articlesModel);
        $method = $_GET['method'] ?? 'EditArticle';
        $controller->{$method}($request[1]);

    break;
    default:
        http_response_code(404);
}


// routing
/*
function TryToLoadPage() {

    $request = explode('/', trim($_GET['page'], '/') );

    switch ($request[0]){
        case 'articles':
            LoadArticlesArchive(__DIR__.'/src/pages/article.php');
        break;
        case 'article':
            $pageTitle = "article";

            if(count($request) != 2) {
                http_response_code(404);
                return;
            }

            include(__DIR__.'/src/pages/article.php');
            
        break;
        case 'article-edit':

            if(count($request) != 2) {
                http_response_code(404);
                return;
            }

            LoadArticleSingle($request[1],  __DIR__.'/src/pages/article-edit.php');
        break;
        default:
            http_response_code(404);
    }
}

function LoadArticleSingle($id, $path) {
    define('article_id', $id);
    include($path);
}

function LoadArticlesArchive($path) {
    include($path);
}


//TryToLoadPage();
*/




/*class ahouj {
    public $test;
    private const headerFile = __DIR__.'/parts/header.php';
    public function __construct(){
        $this->test = "helmut";
    }

    public function smth(){
        var_dump($this);
        extract((array)$this);

        include(__DIR__."/test.php");
    }
}

$a = new ahouj();

$a->smth();



exit;
var_dump($_GET);

define("SOURCE", "");
define("TEMPLATES", "src/templates");*/















