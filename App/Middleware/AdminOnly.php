<?php

namespace App\Middleware;

use App\Core\Resources\Middleware;

class AdminOnly extends Middleware
{
    protected $name = 'is_admin';

    public function guard(Object $message)
    {
        var_dump('pppppppppppppppp');
        if($message->author->id === '288445693889085440'){
            return true;
        }
        return false;
    }
}
