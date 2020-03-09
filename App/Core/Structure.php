<?php

namespace App\Core;

include __DIR__ . '/Resources/Command.php';
include __DIR__ . '/Resources/Exception.php';
include __DIR__ . '/Resources/Route.php';
include __DIR__ . '/Resources/Middleware.php';

use App\Core\Resources\Middleware;
use App\Core\Resources\Command;
use App\Core\Resources\Exception;
use App\Core\Resources\Route;

class Structure
{
    protected $commands;
    protected $routes;
    protected $middleware;

    /*
     *
     * Description: overwrite any memory with empty array && prepare the bot to bootup.
     * 
     * @param Command $command
     * @return void
     * 
     */
    protected function __construct()
    {
        $this->commands   = [];
        $this->routes     = [];
        $this->middleware = [];

        $this->prepareApplication();
    }

    /*
     *
     * Description: Register the base foundation for command, middleware and routing to be extended within the app
     * 
     * @param Command $command
     * @return void
     * 
     */
    private function prepareApplication()
    {
        /*
         *
         * Add core middleware and shit here
         * 
         *
         * 
            $middleware = new Middleware;
            $this->registerMiddleware($middleware);

            $command = new Command('>>', 'bot admin commands');
            $this->registerCommand($command);

            $route = new Route($command, $middleware);
            $this->registerRoute($route);
         *
         */

    }

    protected function routes(Object $message){
        // parse the message for any commands;
        foreach($this->routes as $route){
            if($route->hasPossibleCommand($message)){
                return [
                    'command'    => $route->getCommand(),
                    'middleware' => $route->getMiddleware()
                ];
            }
        }

        return null;
    }


    /*
     *
     * Purpose: Registering a command into the App Object
     * Description: Registering a command lets the App object know that it exists and can be executed if called
     * 
     * @param Command $command
     * @return void
     * 
     */
    protected function registerCommand(Command $command)
    {
        // to do
        // check if command is already registered

        // push the command
        array_push($this->commands, $command);
    }

    /*
     *
     * Description: Return registered commands
     * 
     * @return array $commands
     * 
     */
    protected function getCommands()
    {
        // return an array of command obj's
        return $this->commands;
    }


    /*
     *
     * Purpose: Registering middleware into the App Object
     * Description: Registering middleware lets the App object know that it exists and can be executed if called
     * for conducting processing prior to executing a command. 
     * 
     * @param Middleware $middleware
     * @return void
     * 
     */
    protected function registerMiddleware(Middleware $middleware)
    {
        // to do
        // check if middleware is already registered

        // push the middleware
        array_push($this->middleware, $middleware);
    }

    /*
     *
     * Description: Return registered commands
     * 
     * @return array $commands
     * 
     */
    protected function getMiddleware()
    {
        // return an array of command obj's
        return $this->middleware;
    }

    /*
     *
     * Description: Registering a route into the App Object to organize the structure of the commands injecting middleware onto a command via the route
     * 
     * @param Route $route
     * @return void
     * 
     */
    protected function registerRoute(Route $route)
    {
        // to do
        // check if command is already registered

        // push the route
        array_push($this->routes, $route);
    }

    /*
     *
     * Description: Returns an array of routes
     * 
     * @return array $routes;
     * 
     */
    protected function getRoutes()
    {
        // return an array of route obj's
        return $this->routes;
    }
}
