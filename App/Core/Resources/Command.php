<?php

namespace App\Core\Resources;

use App\Core\Resources\Middleware;

class Command
{
    protected $prefix;
    protected $name;
    protected $middleware;

    public function __construct()
    {
        $this->middleware = new Middleware;
    }

    public function setMiddleware(Middleware $middleware){
        $this->middleware = $middleware;
    }

    public function getMiddleware(){
        return $this->middleware;
    }

    public function getPrefix(){
        return $this->prefix;
    }

    public function getName(){
        return $this->name;
    }
}