<?php
namespace App\Rpc;

use Flash\Prototype\BaseRpc;
use Flash\Env;

class BaiduRpc extends BaseRpc
{
    protected $base_uri = array(
        Env::DEV    => 'http://www.baidu.com',
        Env::TEST   => 'http://www.baidu.com',
        Env::ONLINE => 'http://www.baidu.com',
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
