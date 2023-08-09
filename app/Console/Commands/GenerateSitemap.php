<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

use App\Models\Post;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $mainPage = array('home', 'javascript', 'php', 'vuejs', 'others', 'life');

        // 메인페이지의 sitemap생성
        foreach ($mainPage as $routeName) {
            $sitemap->add(Url::create(route($routeName))
                ->setLastModificationDate(now())
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_ALWAYS)
                ->setPriority(1.0));
        }

        // 게시물의 sitemap생성
        $sitemap->add(Post::all());
        $sitemap->writeToFile(public_path('sitemap.xml'));
        return Command::SUCCESS;
    }
}
