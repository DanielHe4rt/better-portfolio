<?php

use Illuminate\Database\Seeder;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $informations = [
            ['name' => 'fullname', 'value' => 'John Doe','description' => ''],
            ['name' => 'picture_url', 'value' => 'https://placehold.it/300x300','description' => ''],
            ['name' => 'base_description', 'value' => 'Fullstack Developer', 'description' => ''],
            ['name' => 'about', 'value' => 'Give me a job', 'description' => ''],
            ['name' => 'twitter_url', 'value' => 'https://twitter.com/johndoe', 'description' => ''],
            ['name' => 'github_url', 'value' => 'https://github.com/johndoe', 'description' => ''],
            ['name' => 'linkedin_url', 'value' => 'https://linkedin.com/in/johndoe', 'description' => ''],
            ['name' => 'email', 'value' => 'johndoe@heartdevs.com', 'description' => ''],
            ['name' => 'phone_number', 'value' => '+55 11 99551-9955', 'description' => ''],
        ];

        foreach($informations as $info){
            \App\Entities\Helpers\Profile::create($info);
        }
    }
}
