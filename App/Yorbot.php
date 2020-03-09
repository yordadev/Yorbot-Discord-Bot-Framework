<?php
namespace App;

include __DIR__ . '/Core/Structure.php';
include __DIR__ . '/Commands/ExampleCommand.php';


use App\Core\Structure;
use App\Commands\ExampleCommand;

class Yorbot extends Structure {


    public function __construct()
    {
        $this->boot();
    }
    /*
     *
     * Description: for registering commands, middleware and routes with the bot.
     * 
     * @return void
     * 
     */
    public function boot(){
         // register your commands here
         $exampleCommand = new ExampleCommand('>>', 'bot admin terminal');
         $this->registerCommand($exampleCommand);
    }
}