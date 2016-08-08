<?php
namespace App\Bootstrap;

use Flash\Prototype\IocBase;
use Respect\Validation\Exceptions\NestedValidationException;

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

    public function getValidateFunction()
    {
        $func = function($validator, $param) {
            try {
                $validator->assert($param);
                return array(true, '');
            } catch(NestedValidationException $exception) {
                $message = $exception->getMessages();
                $message = implode(', ', $message);
                return array(false, $message);
            }
        };
        return $func;
    }
}
