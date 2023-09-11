<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // 로컬 아래의 커맨드 스케줄 실행 명령어 (cron대신에 일시적으로 실행시 사용)
        // php artisan schedule:work
        
        // 서버 실행 명령어 아래의 크론을 사용해서 매 분마다 php artisan schedule:run 한다
        // * * * * * cd /home/ubuntu/wallydev-laravel && php artisan schedule:run >> /dev/null 2>&1
        // 사이트맵 생성 명령어
        $schedule->command('sitemap:generate')->daily();
        // DB백업 명령어
        $schedule->command('database:backup')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
