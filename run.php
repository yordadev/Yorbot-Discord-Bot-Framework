<?php

include __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/App/Yorbot.php';

use App\Yorbot;

try {
    $discord = new \Discord\Discord([
        'token' => '',
    ]);

    $app = new Yorbot;

    $discord->on('ready', function ($discord) use ($app) {

        try {
            $discord->on('message', function ($message) use ($app) {
                
                $route = $app->routes($message);
                print_r($route);
                if (!is_null($route)) {
                    
                    if($route['middleware']->guard($message)){
                        $route['command']->handle($message);
                    }
                }
            });
        } catch (\Exception $e){
            var_dump($e);
        }
    });

    $discord->run();
} catch (\Exception $e) {
    var_dump($e);
}
