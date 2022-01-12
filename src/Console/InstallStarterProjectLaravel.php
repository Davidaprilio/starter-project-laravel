<?php

namespace  Davidaprilio\LaravelStarter\Console;

use Illuminate\Console\Command;

class InstallStarterProjectLaravel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'davpack:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menyiapkan "Starter Project Laravel" untuk anda';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Installing Starter Project Laravel...');

        $this->info('Publishing configuration...');

        copy(__DIR__.'/../../stubs/app/Models/Desa.php', app_path('Models/Desa.php'));

        // if (! $this->configExists('blogpackage.php')) {
        //     $this->publishConfiguration();
        //     $this->info('Published configuration');
        // } else {
        //     if ($this->shouldOverwriteConfig()) {
        //         $this->info('Overwriting configuration file...');
        //         $this->publishConfiguration($force = true);
        //     } else {
        //         $this->info('Existing configuration was not overwritten');
        //     }
        // }

        $this->info('Installed Starter Project Laravel');
    }



}
