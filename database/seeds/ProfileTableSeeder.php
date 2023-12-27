<?php

use App\Models\Helpers\Profile;
use App\Traits\Database\DisableForeignKeys;
use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    use DisableForeignKeys;

    public function run()
    {
        $this->disableForeignKeys();

        Profile::query()->truncate();
        foreach (config('portfolio.base-information') as $info) {
            Profile::create($info);
        }

        $this->enableForeignKeys();
    }
}
