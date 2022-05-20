<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class testCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'refresh:executeCommand';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'refresh my project && make artisan queue: work && Queue:rest commands';

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
        Artisan::call('view:clear');
        Artisan::call('optimize:clear');
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('queue:restart');
    }
}
