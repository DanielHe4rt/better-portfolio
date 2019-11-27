<?php

use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            [
                'name' => 'PHP',
                'type_id' => 1,
                'time_id' => 5,
            ],
            [
                'name' => 'Laravel',
                'type_id' => 2,
                'time_id' => 3,
            ],
            [
                'name' => 'MySQL',
                'type_id' => 1,
                'time_id' => 4,
            ],
            [
                'name' => 'JavaScript',
                'type_id' => 1,
                'time_id' => 1,
            ]
        ];
        foreach($skills as $skill){
            \App\Entities\Skill\Skill::create($skill);
        }
    }
}
