<?php
define('WEB_ROOT', __DIR__ . '/..');
require WEB_ROOT . '/vendor/autoload.php';

use Flash\Env;
use Flash\Utils\Helpers;
use Flash\Configger;

define('ENV', Env::getEnv());
if (ENV === Env::ONLINE) {
    ini_set('display_errors', 'Off');
    error_reporting(0);
} else {
    ini_set('display_errors', 'On');
    error_reporting(E_ERROR | E_WARNING | E_PARSE);
}

define('LOG_ID', Helpers::uuid());

$config = Configger::getConfig(ENV);

$app = new \Slim\App(array('settings' => $config));
require_once WEB_ROOT . '/src/Bootstrap/bootstrap.php';
$app->run();
