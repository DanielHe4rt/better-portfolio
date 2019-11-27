<?php

use Illuminate\Database\Seeder;

class SkillTimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            '1m-6m',
            '6m-1y',
            '1y-2y',
            '2y-3y',
            '3y+'
        ];
        foreach($data as $value){
            \App\Entities\Skill\Time::create(['name' => $value]);
        }
    }
}
