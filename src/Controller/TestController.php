<?php
namespace App\Controller;

use Respect\Validation\Validator as v;

class TestController extends BaseController
{
    public function output($request, $response, $args)
    {
        $query = $request->getQueryParams();
        $validator = v::key('a', v::stringType()->length(1,32))
            ->key('b', v::alnum());

        list($ok, $message) = $this->validate($validator, $query);
        if (!$ok) {
            return $this->view->error('INPUT_ERROR', $message);
        }

        $ret = array();
        for ($i=0; $i<4; $i++) {
            $ret[] = array('data' => $i);
        }
        return $this->view->render($ret);
    }
}
