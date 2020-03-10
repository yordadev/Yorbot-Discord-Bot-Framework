<?php

include __DIR__ . '/vendor/autoload.php';
include __DIR__ . '/App/Yorbot.php';

use App\Yorbot;

try {
    $discord = new \Discord\Discord([
        'token' => 'Njg2NDMxMTU2Mjg3NDM4OTA5.XmbPLw.wvnNIwzKfn-6KIcNKGka19KK7cA',
    ]);

    $app = new Yorbot;

    $discord->on('ready', function ($discord) use ($app) {

        try {
            $discord->on('message', function ($message) use ($app) {
                
                $route = $app->routes($message);
                
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
