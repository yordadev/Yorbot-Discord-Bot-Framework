<?php

namespace App\Commands;

use App\Core\Resources\Command;

class ExampleCommand extends Command
{
    protected $name = 'hello';
    
    protected $prefix  = '>>';

    public function handle(Object $message)
    {
        return $message->reply('Hello, World.') ?? null;
    }
}
