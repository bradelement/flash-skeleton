<?php
namespace App\Middleware;

use Flash\Utils\Clock;
use Flash\Prototype\BaseMiddleware;

class Log extends BaseMiddleware
{
    public function __invoke($request, $response, $next)
    {
        $log_id = LOG_ID;
        $req = json_encode($this->logServer($_SERVER));
        $this->logger->info("beginning receive req: LOG_ID($log_id) req($req)");

        $clock = new Clock();
        $response = $next($request, $response);
        $time = $clock->spent();

        $res = (string)$response->getBody();
        $this->logger->info("ending send res: LOG_ID($log_id) time($time) ret($res)");

        return $response;
    }

    protected function logServer($param)
    {
        $ret = array();
        $key = array('REQUEST_METHOD', 'REQUEST_URI', 'REMOTE_ADDR', 'REMOTE_PORT');
        foreach ($key as $k) {
            $ret[$k] = $param[$k];
        }
        return $ret;
    }
}
