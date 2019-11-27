<?php

use Illuminate\Database\Seeder;

class WorkPlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'company_name' => 'Google',
                'role' => 'Software Engineer',
                'description' => 'very nice',
                'joined_at' => '2010-01-05',
                'lefted_at' => '2014-05-10',
                'skills' => [1,2,3]
            ],
            [
                'company_name' => 'Facebook',
                'role' => 'Data Scientist',
                'description' => 'very good place to work',
                'joined_at' => '2015-02-02',
                'lefted_at' => '2017-01-14',
                'skills' => [2,4]
            ],
        ];

        foreach($data as $value){
            $roles = $value['skills'];
            unset($value['skills']);
            $data = App\Entities\Place\Place::create($value);
            $data->skills()->sync($roles);
        }
    }
}
