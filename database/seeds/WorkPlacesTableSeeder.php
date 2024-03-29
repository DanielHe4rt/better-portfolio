<?php

use App\Entities\Place\Place;
use App\Traits\Database\DisableForeignKeys;
use Illuminate\Database\Seeder;

class WorkPlacesTableSeeder extends Seeder
{
    use DisableForeignKeys;
    public function run()
    {
        $this->disableForeignKeys();
        Place::query()->truncate();
        foreach (config('portfolio.worked-places') as $value) {
            $roles = $value['skills'];
            unset($value['skills']);
            $data = Place::query()->create($value);
            $data->skills()->sync($roles);
        }

        $this->enableForeignKeys();
    }
}
