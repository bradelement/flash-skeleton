<?php
namespace App\Controller;

use Flash\Prototype\BaseController;

class TestController extends BaseController
{
    public function output($request, $response, $args)
    {
        echo 'hello, flash';
    }
}
