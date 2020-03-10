<?php
namespace App;

include __DIR__ . '/Core/Structure.php';
include __DIR__ . '/Commands/ExampleCommand.php';
include __DIR__ . '/Middleware/AdminOnly.php';

use App\Core\Structure;
use App\Middleware\AdminOnly;
use App\Core\Resources\Route;
use App\Commands\ExampleCommand;

class Yorbot extends Structure {

    public function __construct()
    {
        $this->commands   = [];
        $this->routes     = [];
        $this->middleware = [];

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
        // register command here
        $exampleCommand = new ExampleCommand();

        // set middleware here
        $middleware = new AdminOnly();
        $exampleCommand->setMiddleware($middleware);

        $this->registerCommand($exampleCommand);

        // register the commands route
        $route = new Route($exampleCommand);
        $this->registerRoute($route);
    }
}