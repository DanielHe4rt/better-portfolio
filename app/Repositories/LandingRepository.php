<?php

namespace App\Repositories;

use App\Entities\Articles\Article;
use App\Entities\Helpers\Profile;
use App\Transformers\LandingProfileTransformer;

class LandingRepository
{
    public function build(): array
    {
        return [
            'profile' => app(LandingProfileTransformer::class)->handle(Profile::all()->toArray()),
            'articles' => Article::query()->orderByDesc('created_at')->limit(3)->get()
        ];
    }
}
