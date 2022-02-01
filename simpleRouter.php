<?php

class Router {

    public function __construct($path)  {
        $this->path = $path;
    }

    public function Dispatch() {
        
        if(!$this->CheckIfCommandIsValid()) 
            http_response_code();
    }

    private function CheckIfCommandIsValid() : bool {
        

        return true;
    }




    public function LoadScript() {
        echo "jha";
        //include_once
    }
}
