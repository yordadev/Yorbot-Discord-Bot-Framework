<?php

include __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/App/Yorbot.php';

use App\Yorbot;

try {
    $discord = new \Discord\Discord([
        'token' => 'removed',
    ]);

    $app = new Yorbot;

    $app->boot();
    $discord->on('ready', function ($discord) use ($app) {

        $discord->on('message', function ($message) use ($app) {

            /*
             * 
             * @param Object $message
             * @return Route $route ?? null
             * 
             */
            $route = $app->routes($message);

            if (!is_null($route)) {

                /*
                 * 
                 * @property Middleware $route['middleware']
                 *  
                 * @param Middleware $route['middleware]
                 * @param Object $message
                 * 
                 * @return boolean
                 */
                if ($route->middleware($route['middleware'], $message)) {

                    /*
                     * 
                     * @property Middleware $route['command]
                     * 
                     * @param Object $message
                     * @return void
                     * 
                     */
                    $route['command']->handle($message);
                }
            }
        });
    });

    $discord->run();
} catch (\Exception $e) {
    /*
     *
     * Exception Handling System
     * 
     * /Exception/example.php
     * 
     */
    
    var_dump($e);
}
