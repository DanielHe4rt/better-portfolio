<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MailStatusTableSeeder::class);
        $this->call(SkillTimeSeeder::class);
        $this->call(SkillTypeSeeder::class);
        $this->call(SkillsSeeder::class);
        $this->call(ProfileTableSeeder::class);
        $this->call(WorkPlacesTableSeeder::class);
    }
}
