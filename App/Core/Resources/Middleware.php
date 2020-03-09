<?php

namespace App\Core\Resources;

class Middleware 
{
    protected $name;
    protected $prefix;
    protected $guard;

    public function __construct(){

    }

    public function handle(){
        return true;
    }

}