<?php
namespace App\Rpc;

use Flash\Prototype\BaseRpc;
use Flash\Env;

class TestRpc extends BaseRpc
{
    protected $base_uri = array(
        Env::DEV    => 'http://www.sina.com',
        Env::TEST   => 'http://www.sina.com',
        Env::ONLINE => 'http://www.sina.com',
    );
    protected $timeout = 5;
    protected $api_list = array(
        'root' => array('GET', '/', array()),
    );

    public function parse($response)
    {
        return parent::parse($response);
    }
}
