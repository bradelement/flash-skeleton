<?php
namespace App\Bootstrap;

use Flash\Prototype\IocBase;

class DependencyProvider extends IocBase
{
    public function getLogger()
    {
        $settings = $this->ci->get('settings')['logger'];
        $handler = new \Monolog\Handler\RotatingFileHandler($settings['path']);
        $formatter = new \Monolog\Formatter\LineFormatter();
        $formatter->ignoreEmptyContextAndExtra();
        $handler->setFormatter($formatter);

        $logger = new \Monolog\Logger($settings['name']);
        $logger->pushHandler($handler);

        return $logger;
    }
}
