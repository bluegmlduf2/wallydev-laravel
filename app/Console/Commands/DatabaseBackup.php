<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DatabaseBackup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     * php artisan database:backup
     */
    protected $signature = 'database:backup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start Database Backup.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->backup();
        return Command::SUCCESS;
    }

    public function backup()
    {
        $fileName = Carbon::now()->format("Ymd-His") . "-tables.sql";
        $filePath = storage_path('backup/') . $fileName;
        $connection = config('database.default');
        $user = config('database.connections.' . $connection . '.username');
        $password = config('database.connections.' . $connection . '.password');
        $host = config('database.connections.' . $connection . '.host');
        $database = config('database.connections.' . $connection . '.database');

        $command = "mysqldump -u $user -p'$password' --host $host $database > $filePath";
        // $command = "mysqldump --login-path=$user --host=$host $database > $filePath";

        $output = null;
        exec($command, $output, $error);

        // exec 를 통해 에러가 발생하면 $error 변수에 에러코드가 담깁니다.
        if (isset($error) && $error > 0) {
            Log::warning("Database Backup Failed. ERROR CODE : " . $error);
        }

        Log::info("Database backup was successful. File Name :" . $fileName);
    }
}
