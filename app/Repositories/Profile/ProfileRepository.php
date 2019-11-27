<?php


namespace App\Repositories\Profile;


use App\Entities\Helpers\Profile;
use App\Repositories\BaseRepository;

class ProfileRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Profile();
    }
}
