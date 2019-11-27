<?php


namespace App\Repositories\Skill;


use App\Entities\Skill\Skill;
use App\Repositories\BaseRepository;

class SkillsRepository extends BaseRepository
{
    public function __construct()
    {
        $this->model = new Skill();
    }
}
