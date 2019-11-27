<?php

use Illuminate\Database\Seeder;

class MailStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            [
                'name' => 'unread',
                'type' => 'warning',
            ],
            [
                'name' => 'readed',
                'type' => 'primary',
            ],
            [
                'name' => 'answered',
                'type' => 'success',
            ]
        ];
        foreach($status as $value){
            \App\Entities\Mailer\Status::create($value);
        }
    }
}
