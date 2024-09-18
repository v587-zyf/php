<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * 在容器中注册绑定
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        // 系统全称
//        view()->share('siteName', SITE_NAME);
//        // 系统简称
//        view()->share("nickName", NICK_NAME);
//        // 系统版本
//        view()->share("version", VERSION);

//        View::composer('*', 'App\Http\ViewComponents\ExampleComponent');
//
//        Blade::directive('render', function ($expression) {
//            list($class, $params) = explode(',', $expression, 2);
//            print_r($class);exit;
//            $class = "App\\Http\\ViewComponents\\" . trim($class, '\'" ');
/*            return "<?php echo app()->makeWith('$class', $params)->toHtml(); ?>";*/
//        });
    }
}
