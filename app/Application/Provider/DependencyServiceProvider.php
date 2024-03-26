<?php

namespace App\Application\Provider;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class DependencyServiceProvider extends ServiceProvider
{
    private array $dependencies;

    public function __construct($app)
    {
        parent::__construct($app);

        $this->dependencies = require(base_path('/config/dependencies.php'));
    }

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->dependencies as $interface => $dependency) {
            $this->app->bind($interface, $dependency);
        }
    }
}
