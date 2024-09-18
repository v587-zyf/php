<?php

namespace App\Http\Middleware;

use App\Models\ActionLogModel;
use Closure;

class ActionLog
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->isMethod('post')) {
            ActionLogModel::record();
        }
        return $next($request);
    }
}
