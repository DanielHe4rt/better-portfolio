<?php


namespace App\Repositories\Admin\Profile;


use App\Entities\Helpers\Profile;
use App\Repositories\BaseRepository;

class ProfileRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Profile();
    }

    public function build()
    {
        return $this->model->newQuery()->get();
    }
}
