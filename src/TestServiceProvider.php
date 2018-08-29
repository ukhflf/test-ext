<?php

namespace Ukhflf\Testext;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/testext.php';
        $this->publishes([$configPath => $this->getConfigPath()], 'test-ext-configs');
        $this->publishes([__DIR__.'/../database/migrations' => database_path('migrations')], 'test-ext-migrations');
        
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        
//         $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
//         $configPath = __DIR__ . '/../config/testext.php';
//         $this->mergeConfigFrom($configPath, 'testext');
    }
    
    
    /**
     * Get the config path
     *
     * @return string
     */
    protected function getConfigPath()
    {
        return config_path('testext.php');
    }
    
    
    /**
     * Publish the config file
     *
     * @param  string $configPath
     */
    protected function publishConfig($configPath)
    {
        $this->publishes([$configPath => config_path('testext.php')], 'test-ext-configs');
    }
    
    
}
