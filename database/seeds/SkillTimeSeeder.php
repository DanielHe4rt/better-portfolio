<?php

use App\Models\Skill\Time;
use App\Traits\Database\DisableForeignKeys;
use Illuminate\Database\Seeder;

class SkillTimeSeeder extends Seeder
{
    use DisableForeignKeys;

    public function run()
    {
        $this->disableForeignKeys();
        Time::query()->truncate();

        foreach (config('portfolio.working-time') as $value) {
            Time::create(['name' => $value]);
        }

        $this->enableForeignKeys();
    }
}
