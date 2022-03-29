<?php

use App\Entities\Helpers\Profile;
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


        foreach(config('portfolio.base-information') as $info){
            Profile::create($info);
        }
    }
}
