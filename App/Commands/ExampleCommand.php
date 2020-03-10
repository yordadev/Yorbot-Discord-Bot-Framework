<?php

namespace App\Commands;

use App\Core\Resources\Command;

class ExampleCommand extends Command
{
    protected $name = 'ping';
    
    protected $prefix  = '>>';

    public function handle(Object $message)
    {
        return $message->reply('Pong. This is an example command.') ?? null;
    }
}
