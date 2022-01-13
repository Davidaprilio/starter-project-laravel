<?php

namespace Davidaprilio\LaravelStarter;

use Davidaprilio\LaravelStarter\Console\InstallStarterProjectLaravel;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

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
        // Register the command if we are using the application via the CLI
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallStarterProjectLaravel::class,
            ]);
        }
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'starterPack');
        $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->configurePublishing();

        $this->loadAllComponent();
    }

    /**
     * Configure publishing for the package.
     * 
     * @return void
     */
    protected function configurePublishing()
    {
        if (!$this->app->runningInConsole()) {
            return;
        }

        // # Model
        // $this->publishes([
        //     __DIR__.'/Models/Desa.php' => resource_path('app/Models'),
        // ], 'ngetes');

        # Views
        $this->publishes([
            __DIR__ . '/../resources/views/auth' => resource_path('views/auth'),
        ], 'start-project');
    }



    protected function loadAllComponent()
    {
        $this->registerComponent('form-edit-profile');
        $this->registerComponent('form-edit-photo-profile');
        $this->registerComponent('form-change-password');
        $this->registerComponent('form-user-change-role');
        $this->registerComponent('form-register');

        $this->registerComponent('daerah-bundle');
        $this->registerComponent('daerah');
        $this->registerComponent('provinsi');
        $this->registerComponent('kota');
        $this->registerComponent('kecamatan');

        $this->registerComponent('sapaan');
        $this->registerComponent('gender');
        $this->registerComponent('img');
        $this->registerComponent('scripts');

        $this->callAfterResolving(BladeCompiler::class, function () {
        });
    }

    /**
     * Register the given component.
     *
     * @param  string  $component
     * @return void
     */
    protected function registerComponent(string $component)
    {
        Blade::component('starterPack::components.' . $component, 'pack-' . $component);
    }
}
