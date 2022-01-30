<?php
require_once(__DIR__.'/../../config/config.php'); // ToDO: default page title nebo se na to vybodni


class PageData {
    private $pageTitle;
    private $pageContent;

    public function __get($varName) {
        return isset($this->$varName) ? $this->$varName : null;
    }

    public function __construct($pageTitle = 'Awesome articles', $content = []) {
        $this->pageTitle = $pageTitle;
        $this->pageContent = $content;
    }

}
