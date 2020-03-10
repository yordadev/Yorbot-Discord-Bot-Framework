<?php

namespace App\Core\Resources;

class Middleware 
{
    protected $name;
    
    public function guard(Object $message){
        return true;
    }

}