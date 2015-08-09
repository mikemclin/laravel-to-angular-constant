<?php

namespace MikeMcLin\Angular;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class JavaScriptServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Angular', function ($app) {
            $view = config('angular.bind_ng_constant_to_this_view');
            $module = config('angular.ng_module');
            $constant = config('angular.ng_constant');

            if (is_null($view)) {
                throw new AngularException;
            }

            $binder = new LaravelViewBinder($app['events'], $view);

            return new LaravelToAngularConstant($binder, $module, $constant);
        });
    }

    /**
     * Publish the plugin configuration.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/angular.php' => config_path('angular.php')
        ]);

        AliasLoader::getInstance()->alias(
            'Angular',
            'MikeMcLin\Angular\AngularFacade'
        );
    }
}
