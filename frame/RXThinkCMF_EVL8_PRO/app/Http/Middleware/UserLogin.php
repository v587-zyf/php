<?php


namespace App\Http\Middleware;

use App\Helpers\Jwt;
use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class UserLogin extends Middleware
{
    /**
     * 执行句柄
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param mixed ...$guards
     * @return mixed
     * @throws \Illuminate\Auth\AuthenticationException
     * @since 2020/8/31
     * @author 牧羊人
     */
    public function handle($request, Closure $next, ...$guards)
    {
        $response = $next($request);

        $action = app('request')->route()->getAction();
        $controller = class_basename($action['controller']);
        list($controller, $action) = explode('@', $controller);
        $noLoginActs = ['LoginController'];
        $token = $request->headers->get('Authorization');
        if (strpos($token, 'Bearer ') !== false) {
            $token = str_replace("Bearer ", null, $token);
            // JWT解密token
            $jwt = new Jwt();
            $userId = $jwt->verifyToken($token);
        } else {
            $userId = 0;
        }
        if (!$userId && !in_array($controller, $noLoginActs)) {
            // 判断用户未登录就跳转至登录页面
            return message("请登录", false, -2);
        }
        //如果已登录则执行正常的请求
        return $response;
    }
}
