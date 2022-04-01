<?php

namespace App\Console\Commands;

use App\Entities\Articles\Article;
use App\Services\PracticalDevService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class RefillDevToPostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'system:devto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill posts from devto into database.';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle(PracticalDevService $service): int
    {
        $username = $this->ask('Select your DevTo Profile: ');

        $rawPosts = $service->fetchPostsByUsername($username);

        $posts = $this->transformPosts('devto', $rawPosts);

        $this->handlePosts($posts);

        return self::SUCCESS;
    }

    private function transformPosts(string $platform, array $rawPosts): array
    {
        $result = [];
        foreach ($rawPosts as $post) {
            $result[] = [
                'platform' => $platform,
                'platform_id' => $post['id'],
                'cover_image' => $post['cover_image'],
                'title' => $post['title'],
                'reactions' => $post['positive_reactions_count'],
                'comments' => $post['comments_count'],
                'reading_time_minutes' => $post['reading_time_minutes'],
                'published_at' => Carbon::parse($post['published_at']),
                'is_english' => !Str::contains($post['tags'],'braziliandevs'),
                'url' => $post['url']
            ];
        }
        return $result;
    }

    private function handlePosts(array $posts)
    {
        foreach ($posts as $post) {
            $article = Article::query()
                ->where('platform', '=', $post['platform'])
                ->where('platform_id', '=', $post['platform_id'])
                ->first();

            if (!$article) {
                Article::query()->create($post);
                continue;
            }

            $article->update($post);
        }
    }
}
