<?php

use App\Entities\Skill\Skill;
use App\Traits\Database\DisableForeignKeys;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    use DisableForeignKeys;

    public function run()
    {
        $this->disableForeignKeys();
        Skill::query()->truncate();
        foreach (config('portfolio.skills') as $skill) {
            Skill::query()->create($skill);
        }

        $this->enableForeignKeys();
    }
}
