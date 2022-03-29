<?php

use App\Entities\Skill\Type;
use App\Traits\Database\DisableForeignKeys;
use Illuminate\Database\Seeder;

class SkillTypeSeeder extends Seeder
{
    use DisableForeignKeys;

    public function run()
    {
        $this->disableForeignKeys();

        Type::query()->truncate();
        foreach (config('portfolio.tags') as $value) {
            Type::create(['name' => $value]);
        }

        $this->enableForeignKeys();
    }
}
