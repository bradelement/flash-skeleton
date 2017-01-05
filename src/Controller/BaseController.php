<?php
namespace App\Controller;

use Flash\Prototype\IocBase;
use Respect\Validation\Exceptions\NestedValidationException;

class BaseController extends IocBase
{
    public function validate($rules, $source)
    {
        $param = array();
        $currentKey = null;
        try {
            foreach ($rules as $key=>$validator) {
                $currentKey = $key;
                $validator->assert($source[$key]);
                $param[$key] = $source[$key];
            }
            return array(true, '', $param);
        } catch(NestedValidationException $exception) {
            $error = implode(', ', $exception->getMessages());
            $message = "key[$currentKey] error[$error]";
            return array(false, $message, $param);
        }
    }
}
