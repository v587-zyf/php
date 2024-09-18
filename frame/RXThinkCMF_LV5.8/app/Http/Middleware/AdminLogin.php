<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminLogin extends Middleware
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
        if(!session('adminId') && !in_array($controller, $noLoginActs)){
            //判断用户未登录就跳转至登录页面
            return redirect('login/login');
        }
        //如果已登录则执行正常的请求
        return $response;
    }
}
