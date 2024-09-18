<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        \DB::listen(function ($query) {
            $bindings = $query->bindings;
            $sql = $query->sql;
            foreach ($bindings as $replace) {
                $value = is_numeric($replace) ? $replace : "'" . $replace . "'";
                $sql = preg_replace('/\?/', $value, $sql, 1);
            }
//            $time = $query->time;
//            if ($time > 10) {  //when time > 10 print
//                \Log::debug(var_export(compact(['sql', 'bindings', 'time']), true));
//            }
//            \Log::debug(var_export(compact(['sql', 'bindings', 'time']), true));
//            print_r($sql);
//            echo $sql;
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
