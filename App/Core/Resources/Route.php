<?php
namespace App\Core\Resources;

use App\Core\Resources\Command;
use App\Core\Resources\Middleware;

class Route
{
    protected $command;
    protected $middleware;

    public function __construct(Command $command)
    {
        $this->command    = $command;
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

    public function hasCommand(Object $message)
    {
        $extractor = explode(" ", $message->content);
        
        if ($this->command->getPrefix() === $extractor[0]) {

            if($this->command->getName() == $extractor[1]) {
                
                return true;
            }
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
        return $this->command->getMiddleware();
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


    public function hasMiddleware(){
        if(!is_null($this->getMiddleware())){
            return true;
        }
        return false;
    }
}
