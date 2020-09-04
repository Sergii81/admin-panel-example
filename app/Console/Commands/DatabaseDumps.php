<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class DatabaseDumps extends Command
{
    /**
     * Команда для добавление таблиц из database/dump в БД
     */
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:table';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install separate databases from database/dumps';

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
     * @return mixed
     */
    public function handle()
    {
        $path = database_path('dumps');
        $files = File::files($path);
        foreach ($files as $file) {
            $file_path = $file->getRealPath();
            DB::unprepared(file_get_contents($file_path));
        }
    }
}
