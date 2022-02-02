<?php

require_once(__DIR__.'/src/models/articles-model.php');
require_once(__DIR__.'/src/controllers/articles-controller.php');
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
    case 'articles-create':
        $controller = new ArticlesController($articlesModel);
        $method = $_GET['method'] ?? 'GetAllArticlesCreate';
        $controller->{$method}();
        break;
    default:
        http_response_code(404);
}


