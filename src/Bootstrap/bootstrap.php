<?php
use App\Controller\TestController;
use App\Middleware\Log;

//route
$app->get('/test', TestController::class . ':output')->add(Log::class);

//dependency
$container = $app->getContainer();

$container['logger'] = function ($c) {
    return LoggerProvider::get($c);
};
