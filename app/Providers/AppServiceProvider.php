<?php

namespace App\Providers;

use App\Infrastructure\Doctrine\Repositories\DoctrineBlogRepository;
use App\Infrastructure\Doctrine\Repositories\DoctrinePersistRepository;
use App\Infrastructure\Doctrine\Repositories\DoctrineReadRepository;
use Blog\Repositories\BlogRepository;
use Blog\Repositories\PersistRepository;
use Blog\Repositories\ReadRepository;
use Illuminate\Support\ServiceProvider;
use Lib\Criteria\Contracts\Criteria;
use Lib\Criteria\Contracts\Criteria as ICriteria;

class AppServiceProvider extends ServiceProvider
{
    private $classBindings = [
        // Criteria
        ICriteria::class => Criteria::class,

        // Generic Repositories
        PersistRepository::class => DoctrinePersistRepository::class,

        // Read Repositories
        BlogRepository::class => DoctrineBlogRepository::class,
        ReadRepository::class => DoctrineReadRepository::class,
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach ($this->classBindings as $abstract => $concrete) {
            if (is_array($concrete)) {
                $concrete = $concrete[$this->app->environment()] ?? $concrete['default'];
            }

            $this->app->bind($abstract, $concrete);
        }

        if (config('app.debug')) {
            $this->app->register(\Rap2hpoutre\LaravelLogViewer\LaravelLogViewerServiceProvider::class);
            $this->app->register(\PrettyRoutes\ServiceProvider::class);
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    private function configureMonologSentryHandler()
    {
        if (config('sentry.enabled') && config('sentry.logging.enabled')) {
            $this->app->register(\Sentry\Laravel\ServiceProvider::class);
        }
    }
}
