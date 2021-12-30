<?php

namespace Davidaprilio\LaravelStarter;

use Illuminate\Support\ServiceProvider;
// use Livewire\Livewire;

class StarterProjectLaravelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadRoutesFrom(__DIR__.'/../routes/web.php');
        // $this->loadRoutesFrom(__DIR__.'/../routes/livewire.php');
        // $this->configurePublishing();

        // $this->livewireComponent();
    }

    /**
     * Configure publishing for the package.
     * 
     * @return void
     */
    protected function configurePublishing()
    {
        if (! $this->app->runningInConsole()) {
            return;
        }

        # Views
        $this->publishes([
            __DIR__.'/../resources/views/auth' => resource_path('views/auth'),
        ], 'start-project');

        # Migrations
        $this->publishes([
            __DIR__.'/../database/migrations/2021_12_25_173044_add_new_fields_to_users_table.php' => database_path('migrations/2021_12_25_173044_add_new_fields_to_users_table.php'),
        ], 'start-project');
    }



    // protected function livewireComponent()
    // {
    //     Livewire::component('some-component', SomeComponent::class);
    // }

}
