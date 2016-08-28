<?php
namespace App\Controller;

use Flash\Prototype\IocBase;
use Respect\Validation\Exceptions\NestedValidationException;

class BaseController extends IocBase
{
    public function validate($validator, $param) {
        try {
            $validator->assert($param);
            return array(true, '');
        } catch(NestedValidationException $exception) {
            $message = $exception->getMessages();
            $message = implode(', ', $message);
            return array(false, $message);
        }
    }
}
