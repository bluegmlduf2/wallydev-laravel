<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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

        $command = "mysqldump -u $user -p'$password' --host $host $database > $filePath"; // 배포 서버용
        // $command = "sudo mysqldump -u $user -p$password --host $host $database > $filePath"; // LOCAL 테스트용

        $output = null;
        exec($command, $output, $error);

        // exec 를 통해 에러가 발생하면 $error 변수에 에러코드가 담깁니다.
        if (isset($error) && $error > 0) {
            Log::warning("Database Backup Failed. ERROR CODE : " . $error);
        }

        if (file_exists($filePath) && config('filesystems.disks.s3.bucket')) {
            // SQL 파일이 존재하면 Illuminate\Http\File 객체로 반환
            $file = new File($filePath);

            // 이전에 저장한 SQL 파일 삭제 
            Storage::disk('s3')->deleteDirectory('backup/database');

            // SQL 파일을 Amazon S3에 업로드 (put메서드는 Illuminate\Http\File을 매개변수로 사용)
            Storage::disk('s3')->put('backup/database', $file);
        }

        Log::info("Database backup was successful. File Name :" . $fileName);
    }
}
