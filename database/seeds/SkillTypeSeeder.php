<?php

use Illuminate\Database\Seeder;

class SkillTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'language','framework','platform','others'
        ];
        foreach($data as $value){
            \App\Entities\Skill\Type::create(['name' => $value]);
        }
    }
}
