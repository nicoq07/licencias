<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDataBase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'createDataBase {database}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea la base de datos de la aplicación';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return DB::statement("CREATE DATABASE :db CHARACTER 'utf8mb4' COLLATE 'utf8mb4_spanish_ci'", ['db' => $this->argument('database')]);
    }
}
