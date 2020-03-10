<?php

namespace App\Middleware;

use App\Core\Resources\Middleware;

class AdminOnly extends Middleware
{
    protected $name = 'is_admin';

    public function guard(Object $message)
    {
        if($message->author->id === '288445693889085440'){
            return true;
        }
        $this->unauthorized($message);
        return false;
    }

    public function unauthorized(Object $message){
        return $message->reply('Sorry, I only answer to yorda right now.');
    }
}
