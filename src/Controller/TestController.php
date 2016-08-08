<?php
namespace App\Controller;

use Flash\Prototype\BaseController;

class TestController extends BaseController
{
    public function output($request, $response, $args)
    {
        return $this->view->error('TEST_ERROR', 'this is the message');
        $ret = array();
        for ($i=0; $i<4; $i++) {
            $ret[] = array('data' => $i);
        }
        return $this->view->render($ret);
    }
}
