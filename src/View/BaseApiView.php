<?php
namespace App\View;

class BaseApiView
{
    protected $response;
    protected $errorMap = array();
    protected $ret = array(
        'errno'  => 0,
        'errmsg' => 'success',
        'data'   => array(),
        'logid'  => LOG_ID,
    );

    public function __construct($response)
    {
        $this->response = $response;
    }

    public function render($data)
    {
        $this->ret['data'] = $data;
        return $this->output($this->ret);
    }

    public function error()
    {
        $args = func_get_args();
        $error = $args[0];

        if (isset($this->errorMap[$error])) {
            $conf = $this->errorMap[$error];
        } else {
            $conf = [-1, 'unknown error']; //errno errmsg
        }
        $args[0] = $conf[1];

        $this->ret['errno']  = $conf[0];
        $this->ret['errmsg'] = call_user_func_array('sprintf', $args);
        return $this->output($this->ret);
    }

    protected function output($data)
    {
        return $this->response->withJson($data);
    }
}
