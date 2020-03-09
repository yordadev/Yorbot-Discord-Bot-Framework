<?php
namespace App\Core\Resources;

use App\Core\Resources\Command;
use App\Core\Resources\Middleware;

class Route
{
    protected $command;
    protected $middleware;

    public function __construct(Command $command, Middleware $middleware)
    {
        $this->command = $command;
        $this->middleware = $middleware;
    }

    /*
     * 
     * Description: split the message into array and check first slot to see if
     * its a command. 
     * 
     * @param Object $message
     * @return boolean
     * 
     */

    public function hasPossibleCommand(Object $message)
    {
        $extractor = str_split($message->content);

        if ($this->command->getPrefix() === $extractor[0]) {
            return true;
        }
        return false;
    }

    /*
     * 
     * Description: Set the command for the route 
     * 
     * @param Command $command
     * @return void
     * 
     */

    public function setCommand(Command  $command)
    {
        $this->command = $command;
    }


    /*
     * 
     * Description: Get the command for the route
     * 
     * @return Command $command
     * 
     */
    public function getCommand()
    {
        return $this->command;
    }


    /*
     * 
     * Description: get the middleware attached to this route
     * 
     * @return Middleware $middleware
     * 
     */
    public function getMiddleware()
    {
        return $this->middleware;
    }

    /*
     * 
     * Description: receive the middleware && handle the middleware provided
     * to the route. If after handling the message, it may continue. This 
     * method returns true.
     * 
     * @param Middleware $middleware
     * @param Object $message
     * @return boolean
     * 
     */
    protected function middleware(Middleware $middleware, Object $message)
    {
        if (!is_null($middleware) && $middleware->handle()) {
            return true;
        }
        return false;
    }
}
