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
                'current_company' => true,
                'i18n' => [
                    [
                        'lang' => 'pt-br',
                        'role' => 'Engenheiro de Software',
                        'description' => 'muito bom',
                    ],
                    [
                        'lang' => 'en',
                        'role' => 'Software Engineer',
                        'description' => 'very nice',
                    ]
                ],
                'joined_at' => '2010-01-05',
                'skills' => [1, 2, 3]
            ],
            [
                'company_name' => 'Facebook',
                'i18n' => [
                    [
                        'lang' => 'pt-br',
                        'role' => 'Desenvolvedor Back-end',
                        'description' => 'muito bom',
                    ],
                    [
                        'lang' => 'en',
                        'role' => 'Back-end Developer',
                        'description' => 'very nice',
                    ]
                ],
                'joined_at' => '2015-02-02',
                'lefted_at' => '2017-01-14',
                'skills' => [2, 4]
            ],
        ];

        foreach ($data as $value) {
            $roles = $value['skills'];
            $i18n = $value['i18n'];
            unset($value['skills']);
            unset($value['i18n']);
            $data = App\Entities\Place\Place::create($value);
            foreach($i18n as $lang){
                $data->translation()->create($lang);
            }
            $data->skills()->sync($roles);
        }
    }
}
