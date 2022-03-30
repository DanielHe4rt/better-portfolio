<?php


namespace App\Repositories\Admin\Skill;


use App\Entities\Skill\Skill;
use App\Repositories\BaseRepository;

class SkillsRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Skill();
    }
}
