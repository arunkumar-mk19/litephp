<?php

namespace Core\Database\Connectors;

class PDOConnector
{
    protected static $instance;

    private function __construct(){
        
    }
    
    public function __clone(){
        throw new \Exception("Can't clone a singleton");
    }

    public function getInstance()
    {
        # code...
    }
}