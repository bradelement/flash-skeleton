<?php
namespace App\Controller;

use Respect\Validation\Validator as v;

class TestController extends BaseController
{
    public function output($request, $response, $args)
    {
        $rules = array(
            'a' => v::stringType()->length(1, 12),
            'b' => v::alnum(),
        );
        list($ok, $message, $param) = $this->validate($rules, $request->getQueryParams());
        if (!$ok) {
            return $this->view->error('INPUT_ERROR', $message);
        }

        $ret = $param;
        return $this->view->render($ret);
    }
}
