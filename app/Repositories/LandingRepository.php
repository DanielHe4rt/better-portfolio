<?php

namespace App\Repositories;

use App\Entities\Helpers\Profile;
use App\Transformers\LandingProfileTransformer;

class LandingRepository
{
    public function build(): array
    {
        return app(LandingProfileTransformer::class)->handle(
            Profile::all()->toArray()
        );
    }
}
