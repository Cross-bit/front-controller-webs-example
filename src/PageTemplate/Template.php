<?php
require_once(__DIR__.'/PageData.php');

class Template { 

    protected const headerFile = __DIR__.'/../../src/parts/header.php';
    protected const footerFile = __DIR__.'/../../src/parts/footer.php';

    protected $pathToViewFile;

    public function __construct($controllerName, $viewToRender) {
        $this->SetPatToView($controllerName, $viewToRender);
    }

    public function RenderPage(PageData $pageData) {
        
        // ** local variables **
        $pageTitle = $pageData->pageTitle;
        $pageContent = $pageData->pageContent;

        // ** header **
        require_once($this::headerFile);

        // ** page content **

        if(!file_exists($this->pathToViewFile)){
            throw new Exception('View file could not be found! file:'.$this->pathToViewFile);
        }

        include($this->pathToViewFile);

        // ** footer **    
        require_once($this::footerFile);
        
    }

    public static function Redirect(string $targetPage) {
        header('Location: '. $targetPage);
    }

    private function SetPatToView($controllerName, $viewToRender) : void  {
        $controllerName = strtolower($controllerName);
        $viewToRender = strtolower($viewToRender);

        $this->pathToViewFile = __DIR__.'/../views/'.$controllerName.'-'.$viewToRender.'.php';
    }

}

