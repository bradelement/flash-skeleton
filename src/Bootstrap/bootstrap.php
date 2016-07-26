<?php
use App\Controller\TestController;
use App\Bootstrap\DependencyProvider;
use App\Middleware\Log;

//route
$app->get('/test', TestController::class . ':output')->add(Log::class);

//dependency
$container = $app->getContainer();
$container['provider'] = function ($c) {
    return new DependencyProvider($c);
};

$container['logger'] = function ($c) {
    return $c['provider']->getLogger();
};
