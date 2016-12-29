<?php
namespace App\Middleware;

use Flash\Utils\Clock;
use Flash\Prototype\IocBase;

class Log extends IocBase
{
    public function __invoke($request, $response, $next)
    {
        $log_id = LOG_ID;
        $req = $this->logRequest($request);
        $this->logger->info("beginning receive req: LOG_ID($log_id) req($req)");

        $clock = new Clock();
        $response = $next($request, $response);
        $time = $clock->spent();

        $res = (string)$response->getBody();
        $this->logger->info("ending send res: LOG_ID($log_id) time($time) ret($res)");

        return $response;
    }

    protected function logRequest($request)
    {
        $arr = array('curl', '-X');
        $arr[] = $request->getMethod();

        $body = (string)$request->getBody();
        if ($body) {
            $arr[] = '-d';
            $arr[] = "'$body'";
        }
        $uri = (string)$request->getUri();
        $arr[] = "'$uri'";
        return implode(' ', $arr);
    }
}
