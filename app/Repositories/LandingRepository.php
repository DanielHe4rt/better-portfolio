<?php

namespace App\Repositories;

use App\Models\Articles\Article;
use App\Models\Profile;
use App\Transformers\LandingProfileTransformer;

class LandingRepository
{
    public function build(): array
    {
        return [
            'profile' => app(LandingProfileTransformer::class)->handle(Profile::all()->toArray()),
            'articles' => Article::query()
                ->orderByDesc('created_at')
                ->paginate(3),
        ];
    }
}
