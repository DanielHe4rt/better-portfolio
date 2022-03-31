<?php

use App\Entities\Mailer\Status;
use App\Traits\Database\DisableForeignKeys;
use Illuminate\Database\Seeder;

class MailStatusTableSeeder extends Seeder
{
    use DisableForeignKeys;

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
        $this->disableForeignKeys();
        Status::query()->truncate();
        foreach($status as $value){
            Status::create($value);
        }
        $this->enableForeignKeys();
    }
}
